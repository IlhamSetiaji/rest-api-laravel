<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'students';
    protected $guarded = ['id'];

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'faculty_student', 'student_id', 'faculty_id')->withTimestamps();
    }
}
