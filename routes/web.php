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
use App\Models\Tasks;
Route::get('/test', function () {
    $data = new Tasks();
    echo count($data->members());
})->name('abc');
