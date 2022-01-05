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

Route::name('home')->get('/', function () {
    return view('welcome');
});

Route::name('login')->get('/login', function() {
  return view('login');
});

Route::name('register')->get('/register', function() {
  return view('register');
});

Route::name('dashboard')->get('/dashboard', function() {
  return view('dashboard');
});

Route::group(
  [
    'namespace' => 'App\Http\Controllers',
  ],
  function () {
    Route::name('registerUser')->post('/register', 'UserController@register');
    Route::name('loginUser')->post('/login', 'UserController@login');
  });
