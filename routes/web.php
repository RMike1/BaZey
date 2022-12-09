<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\UserController;


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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'Redirect']);


Route::get('project-dashboard', [AdminController::class, 'Dashboard']);

Route::get('categories', [AdminController::class, 'Categories']);

Route::post('create/category', [AdminController::class, 'Store'])->name('create/category');

Route::get('edit/category/{id}', [AdminController::class, 'Edit_category']);

Route::post('edit_category/{id}', [AdminController::class, 'Edit']);

Route::get('delete/category/{id}', [AdminController::class, 'Delete']);

Route::get('dashboard_2', [AdminController::class, 'dashboard_2']);

Route::post('update/profile', [UserController::class, 'UpdateUserProfile']);

Route::get('my_profile', [UserController::class, 'UserProfile'])->name('my_profile');




