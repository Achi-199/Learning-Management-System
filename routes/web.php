<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\SolutionController as TeacherSolutionController;
use App\Http\Controllers\Teacher\TaskController as TeacherTaskController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\StaticPageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/', [StaticPageController::class, 'home'])->name('home');
// Route::get('/contact', [StaticPageController::class, 'contact'])->name('contact');


// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Teacher routes
    Route::middleware('teacher')->prefix('teacher')->group(function () {
        Route::get('/home', [TeacherController::class, 'index'])->name('teacher.home');

        // Tasks
        Route::get('/tasks', [TeacherTaskController::class, 'index'])->name('teacher.tasks.index');
        Route::get('/tasks/create', [TeacherTaskController::class, 'create'])->name('teacher.tasks.create');
        Route::post('/tasks', [TeacherTaskController::class, 'store'])->name('teacher.tasks.store');

        // Subjects
        Route::get('/subjects', [SubjectController::class, 'index'])->name('teacher.subjects.index');
        Route::get('/subjects/create', [SubjectController::class, 'create'])->name('teacher.subjects.create');
        Route::post('/subjects', [SubjectController::class, 'store'])->name('teacher.subjects.store');

        Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('teacher.subjects.show');
        Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('teacher.subjects.edit');
        Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('teacher.subjects.update');
        Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('teacher.subjects.destroy');
        Route::get('/teacher/subjects/{subject}/tasks/create', [TeacherTaskController::class, 'createForSubject'])->name('teacher.subjects.tasks.create');
        Route::post('/teacher/subjects/{subject}/tasks', [TeacherTaskController::class, 'storeForSubject'])->name('teacher.subjects.tasks.store');
        Route::get('/tasks/{task}', [TeacherTaskController::class, 'show'])->name('teacher.tasks.show');

        // Edit and update task
        Route::get('/tasks/{task}/edit', [TeacherTaskController::class, 'edit'])->name('teacher.tasks.edit');
        Route::put('/tasks/{task}', [TeacherTaskController::class, 'update'])->name('teacher.tasks.update');

        Route::get('/teacher/solutions/{solution}/evaluate', [TeacherSolutionController::class, 'edit'])->name('teacher.solutions.edit');
        Route::put('/teacher/solutions/{solution}', [TeacherSolutionController::class, 'update'])->name('teacher.solutions.update');
    });

    // Student routes
    Route::middleware('student')->prefix('student')->group(function () {
        Route::get('/home', [StudentController::class, 'index'])->name('student.home');

        Route::get('/home', [StudentController::class, 'index'])->name('student.home');
        Route::get('/take-subjects', [StudentController::class, 'takeSubjects'])->name('student.subjects.take');
        Route::post('/subjects/{subject}/enroll', [StudentController::class, 'enroll'])->name('student.subjects.enroll');
        Route::delete('/subjects/{subject}/leave', [StudentController::class, 'leave'])
            ->name('student.subjects.leave');
        Route::get('/subjects/take', [StudentController::class, 'takeSubjectPage'])->name('student.subjects.take');
        Route::post('/subjects/{subject}/take', [StudentController::class, 'takeSubject'])->name('student.subjects.enroll');
        Route::get('/subjects/{subject}', [StudentController::class, 'showSubject'])->name('student.subjects.show');

        Route::get('/tasks/{task}', [\App\Http\Controllers\Student\TaskController::class, 'show'])->name('student.tasks.show');
        Route::post('/tasks/{task}/submit', [\App\Http\Controllers\Student\TaskController::class, 'submit'])->name('student.tasks.submit');
    });
});
