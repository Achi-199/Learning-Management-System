<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        $subjects = $student->subjects()->with('teacher')->get();
        return view('student.home', compact('subjects'));
    }

    public function takeSubjects()
    {
        $student = Auth::user();
        $takenIds = $student->subjects()->pluck('subjects.id')->toArray();
        $availableSubjects = Subject::whereNotIn('id', $takenIds)->with('teacher')->get();
        return view('student.take_subjects', compact('availableSubjects'));
    }

    public function enroll(Subject $subject)
    {
        $student = Auth::user();
        $student->subjects()->attach($subject->id);

        return redirect()->route('student.home')->with('success', 'Subject successfully enrolled.');
    }

    public function home()
    {
        $student = auth()->user();
        $subjects = $student->subjects()->with('teacher')->get();

        return view('student.home', compact('subjects'));
    }

    public function leave(Subject $subject)
    {
        auth()->user()->subjects()->detach($subject->id);

        return redirect()->route('student.home')->with('success', 'You have left the subject.');
    }

    public function takeSubjectPage()
    {
        $student = auth()->user();
        $takenIds = $student->subjects()->pluck('subjects.id')->toArray();

        $subjects = \App\Models\Subject::whereNotIn('id', $takenIds)->with('teacher')->get();

        return view('student.take', compact('subjects'));
    }

    public function takeSubject(Subject $subject)
    {
        $user = auth()->user();
        $user->subjects()->attach($subject->id);

        return redirect()->route('student.home')->with('success', 'Subject taken successfully.');
    }

    public function showSubject(Subject $subject)
    {
        $user = auth()->user();

        if (!$subject->students->contains($user->id)) {
            abort(403, 'You are not enrolled in this subject.');
        }

        $subject->load(['teacher', 'students', 'tasks']);

        $submittedTaskIds = $user->solutions()
            ->whereIn('task_id', $subject->tasks->pluck('id'))
            ->pluck('task_id')
            ->toArray();

        return view('student.subject-show', compact('subject', 'submittedTaskIds'));
    }
}
