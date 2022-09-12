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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource("users", \App\Http\Controllers\UserController::class);
Route::delete('user/delete', [\App\Http\Controllers\UserController::class, 'deleteUser'])->name(('users.delete'));

Route::resource("clients", \App\Http\Controllers\ClientController::class);
Route::delete('client/delete', [\App\Http\Controllers\ClientController::class, 'deleteClient'])->name(('clients.delete'));

Route::resource("departments", \App\Http\Controllers\DepartmentController::class);
Route::delete('department/delete', [\App\Http\Controllers\DepartmentController::class, 'deleteDepartment'])->name(('departments.delete'));

Route::resource("airlines", \App\Http\Controllers\AirlineController::class);
Route::delete('airline/delete', [\App\Http\Controllers\AirlineController::class, 'deleteAirline'])->name(('airlines.delete'));

Route::resource("attendences", \App\Http\Controllers\AttendenceController::class);
require __DIR__ . '/auth.php';
