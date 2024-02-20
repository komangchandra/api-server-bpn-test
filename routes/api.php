<?php

use App\Http\Controllers\Api\ApiMajorController;
use App\Http\Controllers\Api\ApiStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/majors', [ApiMajorController::class, 'index'])->name('majors.index');
Route::post('/majors', [ApiMajorController::class, 'store'])->name('majors.store');

Route::controller(ApiStudentController::class)->group(function(){
    Route::get('/students', 'index')->name('students.index');
    Route::get('/students/{student}', 'show')->name('student.show');
    Route::delete('/students/{student}', 'destroy')->name('student.destroy');
    Route::post('/students', 'store')->name('students.store');
    Route::put('/students/{student}', 'update')->name('students.update');
});