<?php

namespace App\Repositories\Student;

use LaravelEasyRepository\Repository;

interface StudentRepository extends Repository
{

    // Write something awesome :)
    public function getAllStudents();
    public function showAllTrashedStudent();
    public function findTrashStudentById($id);
}
