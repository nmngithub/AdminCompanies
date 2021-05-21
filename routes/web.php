<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UsersController;
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

Route::get('admin/login',[UsersController::class, 'getLogin']);
Route::post('admin/login',[UsersController::class, 'postLogin']);
Route::get('admin/logout',[UsersController::class, 'logout']);

Route::group(['prefix'=>'admin', 'middleware'=>'adminlogin'], function(){

    Route::group(['prefix'=>'companies'], function(){
        Route::get('/',[CompaniesController::class, 'index']);

        Route::get('create',[CompaniesController::class, 'create']);
        Route::post('store',[CompaniesController::class, 'store']);

        Route::get('edit/{id}',[CompaniesController::class, 'edit']);
        Route::post('update/{id}',[CompaniesController::class, 'update']);

        Route::get('delete/{id}', [CompaniesController::class, 'delete']);
    });

    Route::group(['prefix'=>'employees'], function(){
        Route::get('/',[EmployeesController::class, 'index']);

        Route::get('create',[EmployeesController::class, 'create']);
        Route::post('store',[EmployeesController::class, 'store']);

        Route::get('edit/{id}',[EmployeesController::class, 'edit']);
        Route::post('update/{id}',[EmployeesController::class, 'update']);

        Route::get('delete/{id}', [EmployeesController::class, 'delete']);
    });
});