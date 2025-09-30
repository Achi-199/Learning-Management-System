<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = [
        'task_id',
        'student_id',
        'user_id',
        'solution_text',
        'earned_points',
        'evaluated_at',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
