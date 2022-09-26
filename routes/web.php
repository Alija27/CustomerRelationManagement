<?php

use App\Http\Controllers\SiteController;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendence;
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

Route::get('/dashboard', [SiteController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource("users", \App\Http\Controllers\UserController::class);
Route::delete('user/delete', [\App\Http\Controllers\UserController::class, 'deleteUser'])->name(('users.delete'));
Route::get("user/task/{id}", [\App\Http\Controllers\UserController::class, 'viewTask'])->name("user.task");

Route::resource("clients", \App\Http\Controllers\ClientController::class);
Route::delete('client/delete', [\App\Http\Controllers\ClientController::class, 'deleteClient'])->name(('clients.delete'));

Route::resource("departments", \App\Http\Controllers\DepartmentController::class);
Route::delete('department/delete', [\App\Http\Controllers\DepartmentController::class, 'deleteDepartment'])->name(('departments.delete'));

Route::resource("airlines", \App\Http\Controllers\AirlineController::class);
Route::delete('airline/delete', [\App\Http\Controllers\AirlineController::class, 'deleteAirline'])->name(('airlines.delete'));

Route::resource("attendences", \App\Http\Controllers\AttendenceController::class);

Route::resource("leaves", \App\Http\Controllers\LeaveController::class);

Route::get("admin/attendences", [\App\Http\Controllers\Admin\AttendenceController::class, "index"])->name('admin.attendence');
Route::get("admin/attendences/{id}", [\App\Http\Controllers\Admin\AttendenceController::class, "show"])->name("admin.attendence.show");

Route::get("admin/leaves", [\App\Http\Controllers\Admin\LeaveController::class, "index"])->name('admin.leaves');
Route::post("admin/approved", [\App\Http\Controllers\Admin\LeaveController::class, "approved"])->name('admin.leave.approved');
Route::post("admin/rejected", [\App\Http\Controllers\Admin\LeaveController::class, "rejected"])->name('admin.leave.rejected');
Route::get("admin/leaves/{id}", [\App\Http\Controllers\Admin\LeaveController::class, "show"])->name('admin.leave.show');

Route::resource("purposes", \App\Http\Controllers\PurposeController::class);
Route::delete('purpose/delete', [\App\Http\Controllers\PurposeController::class, 'deletePurpose'])->name(('purposes.delete'));

Route::resource("tasks", \App\Http\Controllers\TaskController::class);
Route::delete('task/delete', [\App\Http\Controllers\TaskController::class, 'deleteTask'])->name(('tasks.delete'));
Route::get('task/mytask', [\App\Http\Controllers\TaskController::class, 'myTask'])->name(('task.mytask'));
Route::post('task/pending/{id}', [\App\Http\Controllers\TaskController::class, 'pending'])->name(('task.pending'));
Route::post('task/processing/{id}', [\App\Http\Controllers\TaskController::class, 'processing'])->name(('task.processing'));
Route::post('task/complete/{id}', [\App\Http\Controllers\TaskController::class, 'complete'])->name(('task.complete'));

Route::get("birthdays", [\App\Http\Controllers\SiteController::class, 'birthday'])->name("birthdays");

require __DIR__ . '/auth.php';
