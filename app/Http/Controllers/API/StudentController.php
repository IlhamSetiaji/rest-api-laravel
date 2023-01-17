<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Student\StoreStudentRequest;
use App\Services\Student\StudentService;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function getAllStudents()
    {
        return $this->studentService->getAllStudents();
    }

    public function getStudentById($id)
    {
        return $this->studentService->getStudentById($id);
    }

    public function storeStudent(StoreStudentRequest $storeStudentRequest)
    {
        $payload = $storeStudentRequest->validated();
        return $this->studentService->storeStudent($payload);
    }

    public function updateStudent(StoreStudentRequest $storeStudentRequest, $id)
    {
        $payload = $storeStudentRequest->validated();
        return $this->studentService->updateStudent($id, $payload);
    }

    public function deleteStudent($id)
    {
        return $this->studentService->deleteStudent($id);
    }

    public function showAllTrashedStudent()
    {
        return $this->studentService->showAllTrashedStudent();
    }

    public function findTrashStudentById($id)
    {
        return $this->studentService->findTrashStudentById($id);
    }

    public function restoreStudent($id)
    {
        return $this->studentService->restoreStudent($id);
    }

    public function forceDeleteStudent($id)
    {
        return $this->studentService->forceDeleteStudent($id);
    }
}
