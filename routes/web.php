<?php

use Illuminate\Support\Facades\Auth;
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

// User Redirect function
Route::redirect('/', '/dashboard');

Auth::routes(['register' => false, 'confirm' => false, 'reset' => false]);


Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');

    Route::get('/students', 'StudentController@index')->name('students.index');
    Route::get('/students/create', 'StudentController@create')->name('students.create');
    Route::post('/students', 'StudentController@store')->name('students.store');
    Route::get('/students/{student}/edit', 'StudentController@edit')->name('students.edit');
    Route::put('/students/{student}', 'StudentController@update')->name('students.update');
    Route::delete('/students/{student}', 'StudentController@destroy')->name('students.destroy');
    

    Route::get('/countries', 'CountryController@index')->name('countries.index');
    Route::post('/countries', 'CountryController@store')->name('countries.store');
    Route::put('/countries/{country}', 'CountryController@update')->name('countries.update');
    Route::delete('/countries/{country}', 'CountryController@destroy')->name('countries.destroy');


    Route::get('/classes', 'ClassController@index')->name('classes.index');
    Route::post('/classes', 'ClassController@store')->name('classes.store');
    Route::put('/classes/{classe}', 'ClassController@update')->name('classes.update');
    Route::delete('/classes/{classe}', 'ClassController@destroy')->name('classes.destroy');
});
