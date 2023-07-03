<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Livewire\Employees\EmployeesList;
use App\Http\Livewire\Employees\EmployeeCreate;
use App\Http\Livewire\Employees\EmployeesRestore;
use App\Http\Livewire\Public\Employees\PublicEmployees;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::resource('employees', EmployeeController::class);
    Route::get('employee-create', EmployeeCreate::class)->name('employee.create');
    Route::get('employees', EmployeesList::class)->name('employees');
    Route::get('employee/{id}', EmployeeCreate::class)->name('employee');
    Route::get('employees-inactive', EmployeesRestore::class)->name('employees.inactive');
});

Route::get('public_employees', PublicEmployees::class)->name('employees.public');
