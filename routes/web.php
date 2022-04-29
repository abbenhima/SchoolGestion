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



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'EtudiantController@index')->name('etudiants');
Route::resource('/etudiants','EtudiantController'); 
Route::resource('/professeurs','ProfesseurController');
Route::resource('/cours','CourController');
Route::resource('/salles','SalleController');
Route::resource('/notes','NoteController');
Route::get('/sms/{id}', 'SmsController@sendSms')->name('sendsms');

