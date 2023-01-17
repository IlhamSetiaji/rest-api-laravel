<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculties';
    protected $guarded = ['id'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'faculty_student', 'faculty_id', 'student_id')->withTimestamps();
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
}
