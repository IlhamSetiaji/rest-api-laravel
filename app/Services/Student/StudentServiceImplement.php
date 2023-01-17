<?php

namespace App\Services\Student;

use App\Helpers\ResponseFormatter;
use LaravelEasyRepository\Service;
use App\Repositories\Student\StudentRepository;
use Exception;

class StudentServiceImplement extends Service implements StudentService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(StudentRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    public function getAllStudents()
    {
        try {
            $students = $this->mainRepository->getAllStudents();
            return ResponseFormatter::success($students, 'success get all students');
        } catch (\Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error get all students');
        }
    }

    public function getStudentById($id)
    {
        try {
            $student = $this->mainRepository->find($id);
            if (!$student) {
                return ResponseFormatter::error(null, 'student not found', 404);
            }
            return ResponseFormatter::success($student, 'success get student by id');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error get student by id');
        }
    }

    public function storeStudent($payload)
    {
        try {
            $student = $this->mainRepository->create($payload);
            return ResponseFormatter::success($student, 'success store student');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error store student');
        }
    }

    public function updateStudent($id, $payload)
    {
        try {
            $student = $this->mainRepository->find($id);
            if (!$student) {
                return ResponseFormatter::error(null, 'student not found', 404);
            }
            $student->update($payload);
            return ResponseFormatter::success($student, 'success update student');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error update student');
        }
    }

    public function deleteStudent($id)
    {
        try {
            $student = $this->mainRepository->find($id);
            if (!$student) {
                return ResponseFormatter::error(null, 'student not found', 404);
            }
            $student->delete();
            return ResponseFormatter::success(null, 'success delete student');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error update student');
        }
    }

    public function showAllTrashedStudent()
    {
        try {
            $students = $this->mainRepository->showAllTrashedStudent();
            return ResponseFormatter::success($students, 'success get all trashed students');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error get all trashed students');
        }
    }

    public function findTrashStudentById($id)
    {
        try {
            $student = $this->mainRepository->findTrashStudentById($id);
            if (!$student) {
                return ResponseFormatter::error(null, 'student not found', 404);
            }
            return ResponseFormatter::success($student, 'success get trashed student by id');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error get trashed student by id');
        }
    }

    public function restoreStudent($id)
    {
        try {
            $student = $this->mainRepository->findTrashStudentById($id);
            if (!$student) {
                return ResponseFormatter::error(null, 'student not found', 404);
            }
            $student->restore();
            return ResponseFormatter::success($student, 'success restore student');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error restore student');
        }
    }

    public function forceDeleteStudent($id)
    {
        try {
            $student = $this->mainRepository->find($id);
            if (!$student) {
                return ResponseFormatter::error(null, 'student not found', 404);
            }
            $student->forceDelete();
            return ResponseFormatter::success(null, 'success force delete student');
        } catch (Exception $e) {
            return ResponseFormatter::errorServerError($e->getMessage(), 'error force delete student');
        }
    }
}
