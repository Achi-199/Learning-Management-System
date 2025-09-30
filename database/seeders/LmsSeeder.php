<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LmsSeeder extends Seeder
{
    public function run(): void
    {
        // Create Teachers
        $teacher1 = User::create([
            'name' => 'Teacher One',
            'email' => 'teacher1@example.com',
            'password' => Hash::make('password123'),
            'is_teacher' => true,
        ]);

        $teacher2 = User::create([
            'name' => 'Teacher Two',
            'email' => 'teacher2@example.com',
            'password' => Hash::make('password123'),
            'is_teacher' => true,
        ]);

        // Create Students
        $student1 = User::create([
            'name' => 'Student One',
            'email' => 'student1@example.com',
            'password' => Hash::make('password123'),
            'is_teacher' => false,
        ]);

        $student2 = User::create([
            'name' => 'Student Two',
            'email' => 'student2@example.com',
            'password' => Hash::make('password123'),
            'is_teacher' => false,
        ]);

        // Create Subjects
        $subject1 = Subject::create([
            'name' => 'Web Development',
            'description' => 'Learn HTML, CSS, JS',
            'code' => 'IK-WEB101',
            'credits' => 4,
            'teacher_id' => $teacher1->id,
        ]);

        $subject2 = Subject::create([
            'name' => 'Database Systems',
            'description' => 'Learn SQL and database design',
            'code' => 'IK-DBS202',
            'credits' => 3,
            'teacher_id' => $teacher2->id,
        ]);

        // Students take subjects
        $student1->subjects()->attach($subject1->id);
        $student2->subjects()->attach($subject1->id);
        $student2->subjects()->attach($subject2->id);

        // Create Tasks
        Task::create([
            'subject_id' => $subject1->id,
            'teacher_id' => $teacher1->id, 
            'description' => 'Use HTML and CSS to create a basic site.',
            'points' => 10,
            'title' => 'Website Task', 
        ]);
        

        Task::create([
            'subject_id' => $subject2->id,
            'teacher_id' => $teacher2->id, 
            'description' => 'Create an ER diagram for a university database.',
            'points' => 15,
            'title' => 'DB Task', 
        ]);
        
    }
}
