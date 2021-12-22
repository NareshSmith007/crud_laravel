<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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
Route::get('employee',[EmployeeController::class,'index']);
Route::get('add_employee',[EmployeeController::class,'addemployee']);
Route::post('insert_employee',[EmployeeController::class,'insertemployee']);
Route::get('edit_employee/{id}',[EmployeeController::class,'editemployee']);
Route::post('update_employee',[EmployeeController::class,'updatemployee']);
Route::get('delete_employee/{id}',[EmployeeController::class,'deletemployee']);
