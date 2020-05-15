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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Xử lí login
Route::post('/login', function () {
    echo 123;
})->name('abc');

// test
//use App\Models\Project;
////Route::get('/test', function () {
////    echo Project::with('tasks')->get();
////})->name('abc');
