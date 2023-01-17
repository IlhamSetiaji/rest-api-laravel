<?php

namespace App\Services\Student;

use LaravelEasyRepository\BaseService;

interface StudentService extends BaseService
{

    // Write something awesome :)
    public function getAllStudents();
    public function getStudentById($id);
    public function storeStudent($payload);
    public function updateStudent($id, $payload);
    public function deleteStudent($id);
    public function showAllTrashedStudent();
    public function findTrashStudentById($id);
    public function restoreStudent($id);
    public function forceDeleteStudent($id);
}
