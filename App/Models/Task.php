<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Solution;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'teacher_id',
        'subject_id',
    ];


    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
        //return $this->belongsTo(User::class, 'user_id');
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
