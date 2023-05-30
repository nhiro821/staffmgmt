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
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');

Route::get('/works', [App\Http\Controllers\WorkController::class, 'index'])->name('works.index');
Route::get('/works_arrange', [App\Http\Controllers\WorkController::class, 'index2'])->name('works.index2');

Route::post('/updateStatus', [App\Http\Controllers\WorkController::class, 'works_by_project'])->name('works.by_project');


// Route::post('/updateStatus', [App\Http\Controllers\StatusController::class, 'updateStatus'])->name('status.updateStatus');

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');

Route::get('/custmers', [App\Http\Controllers\CustmerController::class, 'index'])->name('custmers.index');


// Route::get('/staff', [App\Http\Controllers\'StaffController@index')->name('staff.index');
