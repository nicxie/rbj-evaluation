<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Models\Employees;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get();
// Route::post();
// Route::put();
// Route::patch();
// Route::delete();
// Route::options();
// Route::match();
// Route::any();
// Route::view();
// Route::get('/users', 'UserController@index');
// Route::get('/uploadfile', 'UploadfileController@index');
// Route::post('/uploadfile', 'UploadfileController@index');
// Route::get('/main', 'MainController@index');

// Route::get('/', function(){
//     return view('welcome');
// });

// ---Common routes naming---
// index - Show all data or Employees
// show - Show a single data or Employee
// create - Show a form to a new user
// store - Store a data
// edit - Show form to a data
// update - Update a data
// delete - Delete a data


// Route::get('/welcome', [EmployeeController::class, 'index']);

// Route::get('/user', [UserController::class, 'index'])->name('login');

// Route::get('/employees', [EmployeeController::class, 'index']);

// Route::get('/employees/{id}', [EmployeeController::class, 'show']);

Route::controller(UserController::class)->group(function(){
    Route::get('/register', 'register');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login/process', 'process');
    Route::post('/logout', 'logout');
    Route::post('/store', 'store');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/', 'index')->middleware('auth');
    Route::get('/add/employee', 'create');
    Route::post('/add/employee', 'store');
    Route::get('/employee/{id}', 'show');
    Route::put('/employee/{employee}', 'update');
    Route::delete('/employee/{employee}', 'destroy');
});

