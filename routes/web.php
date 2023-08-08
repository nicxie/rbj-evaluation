<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [EmployeeController::class, 'index'])->middleware('auth');
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [UserController::class, 'process']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/store', [UserController::class, 'store']);

