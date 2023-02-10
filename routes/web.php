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
    // return view('dashboard.index');

    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login_manger');
Route::post('/login', 'Dashboard\AuthController@post_login')->name('post_login');
Route::group(['middleware' => ['auth:employees']], function () {
    Route::get('/logout', 'Dashboard\AuthController@logout')->name('logout');

    Route::group(['prefix' => 'mangers'], function () {
        Route::get('/', 'Dashboard\MangerController@index')->name('mangers.list');

        Route::get('/create', 'Dashboard\MangerController@create');

        Route::get('/edit/{id}', 'Dashboard\MangerController@edit');
        Route::get('/delete/{id}', 'Dashboard\MangerController@delete');

        Route::post('/store', 'Dashboard\MangerController@store');
        Route::post('/update', 'Dashboard\MangerController@update');
    });

    Route::group(['prefix' => 'department'], function () {
        Route::get('/', 'Dashboard\DepartmentController@index')->name('departments.list');
        Route::get('/create', 'Dashboard\DepartmentController@create');
        Route::post('/store', 'Dashboard\DepartmentController@store');

        Route::get('/edit/{id}', 'Dashboard\DepartmentController@edit');
        Route::get('/delete/{id}', 'Dashboard\DepartmentController@delete');
        Route::post('/update', 'Dashboard\DepartmentController@update');
    });

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', 'Dashboard\TasksController@index')->name('tasks.list');
        Route::get('/create', 'Dashboard\TasksController@create');
        Route::post('/store', 'Dashboard\TasksController@store');
    });

});
