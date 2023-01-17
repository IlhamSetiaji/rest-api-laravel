<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::prefix('students')->group(function () {
        Route::get('/', [StudentController::class, 'getAllStudents']);
        Route::get('/{id}/detail', [StudentController::class, 'getStudentById']);
        Route::post('/', [StudentController::class, 'storeStudent']);
        Route::post('/{id}', [StudentController::class, 'updateStudent']);
        Route::get('/{id}/delete', [StudentController::class, 'deleteStudent']);
        Route::get('/trashed', [StudentController::class, 'showAllTrashedStudent']);
        Route::get('/{id}/trashed/detail', [StudentController::class, 'findTrashStudentById']);
        Route::get('/{id}/restore', [StudentController::class, 'restoreStudent']);
    });
    Route::get('/force/{id}/delete', [StudentController::class, 'forceDeleteStudent']);
});
