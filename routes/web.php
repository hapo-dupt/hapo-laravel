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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login', 'GeneralController@login')->name('logins');

Route::post('/register', 'GeneralController@registration')->name('registers');

Route::get('/logout', 'GeneralController@logout')->name('logout');

/*
 * Member Route Management
 */
Route::middleware(['member'])->group(function () {
    Route::get('/members', 'MemberController@dashboard')->name('members');

    Route::get('/members/manage-project', 'MemberController@projects')->name('projects');

    Route::get('/members/{id}/detail-project', 'MemberController@detailProjects')->name('member.project_details');

    Route::get('/members/tasks', 'MemberController@selectTasks')->name('tasks');

    Route::get('/members/{id}/manage-tasks', 'MemberController@manageTasks')->name('member.manage_tasks');

    Route::post('/members/completed-tasks', 'MemberController@completedTasks')->name('member.completed_tasks');

    Route::get('/members/member-profile', 'GeneralController@profiles')->name('member.profiles');

    Route::post('/members/change-profile', 'GeneralController@changeProfiles')->name('member.change_profiles');
});

/*
 * Admin Route Management
 */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'AdminController@dashboard')->name('admin');
});
