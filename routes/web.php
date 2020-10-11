<?php

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

Auth::routes(['register'=> false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profil', 'UserController@edit')->name('profil');

// User
Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/create', 'UserController@create');
Route::get('/user/edit/{user}', 'UserController@edit');
Route::delete('/user/{user}', 'UserController@destroy');
Route::patch('/user/edit/{user}', 'UserController@update');
Route::post('/user', 'UserController@store');

// Siswa
Route::get('/student', 'StudentsController@index')->name('student');
Route::get('/student/create', 'StudentsController@create');
Route::get('/student/edit/{user}', 'StudentsController@edit');
Route::delete('/student/{user}', 'StudentsController@destroy');
Route::patch('/student/edit/{user}', 'StudentsController@update');
Route::post('/student', 'StudentsController@store');

// Petugas
Route::get('/employe', 'EmployeesController@index')->name('employe');
Route::get('/employe/create', 'EmployeesController@create');
Route::get('/employe/edit/{user}', 'EmployeesController@edit');
Route::delete('/employe/{user}', 'EmployeesController@destroy');
Route::patch('/employe/edit/{user}', 'EmployeesController@update');
Route::post('/employe', 'EmployeesController@store');

// Bank
Route::get('/bank', 'BanksController@index')->name('bank');
Route::get('/bank/create', 'BanksController@create');
Route::get('/bank/edit/{bank}', 'BanksController@edit');
Route::delete('/bank/{bank}', 'BanksController@destroy');
Route::patch('/bank/edit/{bank}', 'BanksController@update');
Route::post('/bank', 'BanksController@store');

// Pembayaran
Route::get('/payment', 'PaymentController@index')->name('payment');
//index - normal
Route::get('/payment/create', 'PaymentController@create');
Route::put('/payment/{payment}', 'PaymentController@update');
Route::delete('/payment/{payment}', 'PaymentController@destroy');
// Route::patch('/payment/edit/{payment}', 'PaymentController@update');
Route::post('/payment', 'PaymentController@store');
//index - pembayaran selesai
Route::get('/payment/history', 'PaymentsHistoryController@index');
Route::delete('/payment/history/{payment}', 'PaymentsHistoryController@destroy');



// Konfirmasi Pembayaran
Route::get('/confirmation', 'ConfirmationsController@index')->name('confirmation');
//index - normal
Route::get('/confirmation/create', 'ConfirmationsController@create');
Route::put('/confirmation/{confirmation}', 'ConfirmationsController@update');
Route::delete('/confirmation/{confirmation}', 'ConfirmationsController@destroy');
// Route::patch('/confirmation/edit/{confirmation}', 'ConfirmationsController@update');
Route::post('/confirmation', 'ConfirmationsController@store');
//index - pembayaran selesai
Route::get('/confirmation/history', 'ConfirmationsHistoryController@index');
Route::delete('/confirmation/history/{confirmation}', 'ConfirmationsHistoryController@destroy');