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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/contact/submit', 'PageController@contactSubmit')->name('contact.submit');
Route::get('/vulnerability', 'PageController@vulnerability')->name('vulnerability');
Route::post('/vulnerability', 'PageController@vulnerabilitySubmit')->name('vulnerability.submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['as'=>'admin.', 'prefix'=>'admin',  'middleware' => \App\Http\Middleware\Admin::class], function () {
Route::group(['as'=>'admin.', 'prefix'=>'admin'], function () {
    Route::get('/', 'AdminController@dashboard')->name('dashboard');
    Route::get('security', 'AdminController@security')->name('security');
});

Route::group(['as'=>'api.', 'prefix'=>'api'], function () {
    Route::resource('grades', 'GradeController', ['except' => ['edit', 'create'], 'middleware' => 'auth'],);
    Route::resource('users', 'UserController', ['except' => ['edit', 'create']]);
    Route::resource('classes', 'ClassController', ['except' => ['edit', 'create']]);
    Route::resource('roles', 'RoleController', ['except' => ['edit', 'create']]);
    Route::group(['as'=>'admin.', 'prefix'=>'admin', 'middleware' => 'auth'], function () {
        Route::get('/', 'AdminController@index')->name('home');
        Route::get('delete', 'AdminController@delete')->name('delete');
        Route::get('restore', 'AdminController@repopulate')->name('repop');
        Route::resource('vulnerabilities', 'VulnerabilityController', ['except' => ['edit', 'create']]);
    });

});
