<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;

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
    
    return view('dashboard')->with('employees', Employee::all());
})->middleware(['auth'])->name('dashboard');


Route::post('/add-employee',[EmployeeController::class, 'AddEmployee'])->middleware(['auth']);
Route::post('/edit-employee',[EmployeeController::class, 'EditEmployee'])->middleware(['auth']);
Route::post('/delete-employee',[EmployeeController::class, 'DeleteEmployee'])->middleware(['auth']);



require __DIR__.'/auth.php';
