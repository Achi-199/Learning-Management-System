<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Task;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'code', 'credits', 'teacher_id'];

    public function students()
    {
        return $this->belongsToMany(User::class, 'subject_user', 'subject_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
