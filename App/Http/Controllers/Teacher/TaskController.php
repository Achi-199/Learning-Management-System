<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('teacher_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create(Request $request)
    {
        $subjectId = $request->query('subject_id');
        $subject = Subject::findOrFail($subjectId);

        return view('tasks.create', [
            'subject' => $subject,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'points' => 'required|numeric',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $validated['teacher_id'] = auth()->id();

        Task::create($validated);

        return redirect()->route('teacher.subjects.show', $validated['subject_id'])->with('success', 'Task created successfully.');
    }


    public function createForSubject(Subject $subject)
    {
        return view('tasks.create_for_subject', compact('subject'));
    }

    public function storeForSubject(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'points' => 'required|numeric',
        ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->points = $validated['points'];
        $task->teacher_id = auth()->id();
        $task->subject_id = $subject->id;
        $task->save();

        return redirect()->route('teacher.subjects.show', $subject->id)
            ->with('success', 'Task created successfully.');
    }
    public function show(Task $task)
    {
        $task->load(['solutions.student']);

        $submittedCount = $task->solutions->count();
        $evaluatedCount = $task->solutions->whereNotNull('points')->count();

        return view('tasks.show', compact('task', 'submittedCount', 'evaluatedCount'));
    }


    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'points' => 'required|numeric',
        ]);

        $task->update($validated);

        return redirect()->route('teacher.tasks.show', $task->id)
            ->with('success', 'Task updated successfully.');
    }
}
