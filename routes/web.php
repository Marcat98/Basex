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

Route::name('dashboard')->get('/', function () {
    return view('dashboard');
});

Route::name('login')->get('/login', function() {
  return view('login');
});

Route::name('register')->get('/register', function() {
  return view('register');
});

Route::name('createRadar')->get('/newProject', function() {
  return view('createRadar');
});

Route::group(
  [
    'namespace' => 'App\Http\Controllers',
  ],
  function () {
    Route::name('registerUser')->post('/register', 'UserController@register');
    Route::name('loginUser')->post('/login', 'UserController@login');
    Route::name('logout')->get('/logout', 'UserController@logout');
    Route::name('createRadar')->post('/newProject', 'RadarController@createRadar');
    Route::name('projectOverview')->get('/projects', 'RadarController@getProjects');
    Route::name('showRadar')->get('/project/{radarId}', 'RadarController@showRadar');
  });
