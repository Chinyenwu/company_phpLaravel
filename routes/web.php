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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/member', 'MemberController@index')->name('member');
Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::resource('users', 'UserController');

Route::resource('imformation_classes', 'Imformation_ClassController');
Route::resource('imformations', 'ImformationController');
Route::resource('page_classes', 'Page_ClassController');
Route::resource('pages', 'PageController');
Route::resource('fileroom_classes', 'Fileroom_ClassController');
Route::resource('filerooms', 'FileroomController');
Route::resource('auth', 'UserController');




