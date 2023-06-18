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



Route::group(
	['middleware' => 'auth'],
	function () {
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


		Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
		Route::post('/staff_update_day/{id}', [App\Http\Controllers\StaffController::class, 'update_day'])->name('staff.update_day');

		Route::get('/staff_edit/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');


		Route::get('/works', [App\Http\Controllers\WorkController::class, 'index'])->name('works.index');
		Route::get('/works_arrange', [App\Http\Controllers\WorkController::class, 'index2'])->name('works.index2');


		Route::get('/works_by_project', [App\Http\Controllers\WorkController::class, 'works_by_project'])->name('works.by_project');

		Route::post('/updateStatus', [App\Http\Controllers\WorkController::class, 'updateStatus'])->name('works.updateStatus');
		Route::post('/updateMemo', [App\Http\Controllers\WorkController::class, 'updateMemo'])->name('works.updateMemo');

		Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
		Route::get('/projectform', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
		Route::get('/projectedit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
		Route::post('/projectform', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
		Route::post('/projects{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');

		Route::post('/projectworks{id}', [App\Http\Controllers\ProjectController::class, 'workedit'])->name('project.workedit');

		Route::get('/custmers', [App\Http\Controllers\CustmerController::class, 'index'])->name('custmers.index');


		// Route::get('/staff', [App\Http\Controllers\'StaffController@index')->name('staff.index');
	}
);
