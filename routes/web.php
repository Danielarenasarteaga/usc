<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');
Route::resource('campuses', 'CampusController');
Route::resource('careeres', 'CareerController');
Route::resource('educations', 'EducationLevelController');

Route::get('students/preparatoria', function () {
    return view('students.level.hischool');
});

Route::get('students/licenciatura', function () {
    return view('students.level.licenciatura');
});

Route::get('students/maestria', function () {
    return view('students.level.maestria');
});

Route::get('students/doctorado', function () {
    return view('students.level.doctorado');
});

Route::resource('students', 'StudentController');

