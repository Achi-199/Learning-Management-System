<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
   public function edit(Solution $solution)
   {
      $solution->load('task', 'student');
      return view('solutions.edit', compact('solution'));
   }

   public function update(Request $request, Solution $solution)
   {
      $maxPoints = $solution->task->points;

      $validated = $request->validate([
         'points' => "required|integer|min:0|max:$maxPoints",
      ]);

      $solution->points = $validated['points'];
      $solution->evaluated_at = now();
      $solution->save();

      return redirect()->route('teacher.tasks.show', $solution->task_id)
         ->with('success', 'Solution evaluated successfully.');
   }
}
