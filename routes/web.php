<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupDayController;
use App\Http\Controllers\GroupStudentController;
use App\Http\Controllers\GroupTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => '/'], function () {
        Route::get('', [HomeController::class, 'index'])->name('home');
        Route::get('getDataAjax', [HomeController::class, 'getDataAjax'])->name('getDataAjax');
    });

    Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function () {
        Route::get('', [TeacherController::class, 'index'])->name('index');
        Route::get('/show/{teacher}', [TeacherController::class, 'show'])->name('show');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
        Route::put('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
        Route::get('/delete/{teacher}', [TeacherController::class, 'delete'])->name('delete');
        Route::get('/getTeacherShowDataAjax/{teacher}', [TeacherController::class, 'getTeacherShowDataAjax'])->name('getTeacherShowDataAjax');
        Route::get('/studentsSearchAjax', [TeacherController::class, 'studentsSearchAjax'])->name('studentsSearchAjax');
    });

    Route::group(['prefix' => 'experience', 'as' => 'experience.'], function () {
        Route::get('', [ExperienceController::class, 'index'])->name('index');
        Route::get('create', [ExperienceController::class, 'create'])->name('create');
        Route::post('/store', [ExperienceController::class, 'store'])->name('store');
        Route::get('edit/{experience}', [ExperienceController::class, 'edit'])->name('edit');
        Route::put('update/{experience}', [ExperienceController::class, 'update'])->name('update');
        Route::get('delete/{experience}', [ExperienceController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'group', 'as' => 'group.'], function () {
        Route::get('', [GroupController::class, 'index'])->name('index');
        Route::get('create', [GroupController::class, 'create'])->name('create');
        Route::post('/store', [GroupController::class, 'store'])->name('store');
        Route::get('edit/{group}', [GroupController::class, 'edit'])->name('edit');
        Route::get('show/{group}', [GroupController::class, 'show'])->name('show');
        Route::put('update/{group}', [GroupController::class, 'update'])->name('update');
        Route::get('delete/{group}', [GroupController::class, 'delete'])->name('delete');
        Route::get('getPaymentPerMonth/{group}', [GroupController::class, 'getPaymentPerMonth'])->name('getPaymentPerMonth');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update');
        Route::get('delete/{user}', [UserController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'group_day', 'as' => 'group_day.'], function () {
        Route::get('', [GroupDayController::class, 'index'])->name('index');
        Route::get('create', [GroupDayController::class, 'create'])->name('create');
        Route::post('store', [GroupDayController::class, 'store'])->name('store');
        Route::get('edit/{group_day}', [GroupDayController::class, 'edit'])->name('edit');
        Route::put('update/{group_day}', [GroupDayController::class, 'update'])->name('update');
        Route::get('delete/{group_day}', [GroupDayController::class, 'delete'])->name('delete');

        Route::get('getDaysOfGroup', [GroupDayController::class, 'getDaysOfGroup'])->name('getDaysOfGroup');
    });

    Route::group(['prefix' => 'group_types', 'as' => 'group_types.'], function () {
        Route::get('', [GroupTypeController::class, 'index'])->name('index');
        Route::get('create', [GroupTypeController::class, 'create'])->name('create');
        Route::post('store', [GroupTypeController::class, 'store'])->name('store');
        Route::get('edit/{group_type}', [GroupTypeController::class, 'edit'])->name('edit');
        Route::put('update/{group_type}', [GroupTypeController::class, 'update'])->name('update');
        Route::get('delete/{group_type}', [GroupTypeController::class, 'delete'])->name('delete');

        Route::get('show/{group_type}', [GroupTypeController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'group_students', 'as' => 'group_students.'], function () {
        Route::get('', [GroupStudentController::class, 'index'])->name('index');
        Route::get('create', [GroupStudentController::class, 'create'])->name('create');
        Route::post('store', [GroupStudentController::class, 'store'])->name('store');
        Route::get('edit/{groupStudent}', [GroupStudentController::class, 'edit'])->name('edit');
        Route::put('update/{groupStudent}', [GroupStudentController::class, 'update'])->name('update');
        Route::get('delete/{groupStudent}', [GroupStudentController::class, 'delete'])->name('delete');

        Route::get('getStudentsOfGroup', [GroupStudentController::class, 'getStudentsOfGroup'])->name('getStudentsOfGroup');
    });
});
