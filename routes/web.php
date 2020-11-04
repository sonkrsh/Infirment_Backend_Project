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
    return view('index');
});

//Super User
Route::get('/register-Superuser', 'App\Http\Controllers\SuperUserController@index');
Route::post('/SuperUser', 'App\Http\Controllers\SuperUserController@store');
Route::get('/SuperUser-Login', 'App\Http\Controllers\SuperUserController@create');
Route::post('/SuperUserCheck','App\Http\Controllers\SuperUserController@check');
Route::group(['middleware'=>['king']], function () {
    Route::match(['get', 'post'], '/SuperUserDasboard','App\Http\Controllers\SuperUserController@dashboard');
    Route::match(['get', 'post'],'/SuperUserDasboard/permissionAdmin/{id}', 'App\Http\Controllers\SuperUserController@permissionAdmin');
    Route::match(['get', 'post'],'/SuperUserDasboard/permissionUser/{id}', 'App\Http\Controllers\SuperUserController@permissionUser');
    Route::match(['get', 'post'],'/superLogout','App\Http\Controllers\SuperUserController@logout');
});

//End Super User

//Admin
Route::get('/register-admin', 'App\Http\Controllers\AdminController@index');
Route::post('/admin', 'App\Http\Controllers\AdminController@store');
Route::get('/admin-login', 'App\Http\Controllers\AdminController@create');
Route::post('/adminCheck','App\Http\Controllers\AdminController@check');
Route::group(['middleware'=>['admin']], function () {
    Route::match(['get', 'post'], '/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
    Route::post('/adminPost','App\Http\Controllers\AdminController@post');
    Route::match(['get', 'post'],'/adminLogout','App\Http\Controllers\AdminController@logout');
});



//User
Route::get('/register-user', 'App\Http\Controllers\UserController@index');
Route::post('/user', 'App\Http\Controllers\UserController@store');
Route::get('/user-login', 'App\Http\Controllers\UserController@create');
Route::post('/userCheck', 'App\Http\Controllers\UserController@check');
Route::group(['middleware'=>['user']], function () {
    Route::match(['get', 'post'], '/user-dashboard','App\Http\Controllers\UserController@dashboard');
    Route::match(['get', 'post'],'/userLogout','App\Http\Controllers\UserController@logout');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
