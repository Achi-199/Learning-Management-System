<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'code' => ['required', 'regex:/^IK-[A-Z]{3}[0-9]{3}$/'],
            'credits' => 'required|integer|min:1',
        ]);

        $validated['teacher_id'] = auth()->id(); 

        \App\Models\Subject::create($validated);

        return redirect()->route('teacher.home')->with('success', 'Subject created successfully.');
    }

    public function show($id)
    {
        $subject = \App\Models\Subject::with(['students', 'tasks'])->findOrFail($id);
        return view('subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = \App\Models\Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = \App\Models\Subject::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'code' => ['required', 'regex:/^IK-[A-Z]{3}[0-9]{3}$/'],
            'credits' => 'required|numeric',
        ]);

        $subject->update($validated);

        return redirect()->route('teacher.subjects.show', $subject->id)->with('success', 'Subject updated.');
    }
    public function destroy($id)
    {
        $subject = \App\Models\Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('teacher.home')->with('success', 'Subject deleted successfully.');
    }
}
