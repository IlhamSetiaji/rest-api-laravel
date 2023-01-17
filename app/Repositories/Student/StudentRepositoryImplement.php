<?php

namespace App\Repositories\Student;

use App\Models\Student;
use LaravelEasyRepository\Implementations\Eloquent;

class StudentRepositoryImplement extends Eloquent implements StudentRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
    public function getAllStudents()
    {
        return $this->model->all();
    }

    public function showAllTrashedStudent()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function findTrashStudentById($id)
    {
        return $this->model->onlyTrashed()->find($id);
    }
}
