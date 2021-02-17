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

Route::group(['prefix' => 'master', 'namespace' => 'Master', 'middleware' => ['auth:sanctum', 'verified'], 'as' => 'master.'], function () {
    Route::get('dashboard', 'DashboardController@index')
        ->name('dashboard.index');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('departements', 'DepartementController');
    Route::resource('employees', 'EmployeesController');
    Route::get('getDivision/{id}', 'EmployeesController@getDivision');
    Route::resource('permissions', 'PermissionController');
    Route::resource('menus', 'MenuController')->only(['create', 'store']);
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::put('settings/{id}', 'SettingController@update')->name('settings.update');
    Route::get('example', 'ExampleController@index');

    
});
