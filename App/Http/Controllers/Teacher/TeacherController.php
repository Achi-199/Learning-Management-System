<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $subjects = \App\Models\Subject::where('teacher_id', auth()->id())->get();
        return view('teacher.home', compact('subjects'));
    }
}
