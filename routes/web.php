<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/i', function () {
//     return view('index');
// });

Route::get('/login', function () {
    return view('login');
});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/logout', [AccountController::class, 'logout']);
Route::post('/login', [AccountController::class, 'login']);
Route::group(['prefix' => 'dashboard', 'middleware' => ['admin']], function() {
    Route::get('/', [DashboardController::class, 'index']);
    // Route::post('/store', [DepartmentController::class, 'store']);
    // Route::post('/bycampus', [DepartmentController::class, 'bycampus']);
    // Route::post('/one', [DepartmentController::class, 'one']);
    // Route::post('/delete', [DepartmentController::class, 'destroy']);
});



Route::group(['prefix' => 'employee', 'middleware' => ['admin']], function() {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/add', [EmployeeController::class, 'add']);
    Route::post('/store', [EmployeeController::class, 'store']);
    Route::post('/show', [EmployeeController::class, 'show']);
    // Route::post('/bycampus', [DepartmentController::class, 'bycampus']);
    // Route::post('/one', [DepartmentController::class, 'one']);
     Route::post('/delete', [EmployeeController::class, 'destroy']);
});


Route::group(['prefix' => 'account', 'middleware' => ['admin']], function() {
    Route::get('/', [AccountController::class, 'index']);
    Route::post('/show', [AccountController::class, 'show']);
    
});

Route::group(['prefix' => 'faculty', 'middleware' => ['faculty']], function() {
    Route::get('/', [EmployeeController::class, 'indexF']);
    // Route::get('/add', [EmployeeController::class, 'add']);
    // Route::post('/store', [EmployeeController::class, 'store']);
    // Route::post('/show', [EmployeeController::class, 'show']);
    // // Route::post('/bycampus', [DepartmentController::class, 'bycampus']);
    // // Route::post('/one', [DepartmentController::class, 'one']);
    //  Route::post('/delete', [EmployeeController::class, 'destroy']);
});

Route::group(['prefix' => 'dean', 'middleware' => ['dean']], function() {
    Route::get('/', [EmployeeController::class, 'indexD']);
    // Route::get('/add', [EmployeeController::class, 'add']);
    // Route::post('/store', [EmployeeController::class, 'store']);
    // Route::post('/show', [EmployeeController::class, 'show']);
    // // Route::post('/bycampus', [DepartmentController::class, 'bycampus']);
    // // Route::post('/one', [DepartmentController::class, 'one']);
    //  Route::post('/delete', [EmployeeController::class, 'destroy']);
});




