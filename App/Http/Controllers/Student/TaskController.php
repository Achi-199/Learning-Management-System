<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
   public function show(Task $task)
   {
      return view('student.tasks.show', [
         'task' => $task,
         'subject' => $task->subject,
      ]);
   }

   public function submit(Request $request, Task $task)
   {
      $request->validate([
         'solution' => 'required|string',
      ]);

      Solution::create([
         'task_id' => $task->id,
         'student_id' => Auth::id(),
         'user_id' => Auth::id(),
         'solution_text' => $request->input('solution'),
      ]);

      return redirect()->route('student.subjects.show', $task->subject_id)
         ->with('success', 'Solution submitted successfully.');
   }
}
