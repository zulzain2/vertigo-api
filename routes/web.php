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
Route::get('login', function () {
    return view('login');
})->name('login');;




Route::get('/', function () {
    if(auth()->user())
    {
        return view('dashboard');
    }
    else
    {
        return view('login');
    }
});

Route::post('login', 'Auth\LoginController@login');


Route::middleware('auth')->group(function () {

            Route::get('logout', 'Auth\LoginController@logout');

            Route::get('/dashboard', function () {
                return view('dashboard');
            });

            Route::get('/staff', function () {
                return view('staffAssignmentSystem');
            });

            Route::get('/equipment', function () {
                return view('equipment');
            });

            Route::get('/transport', function () {
                return view('transport');
            });

            Route::get('/maintenance', function () {
                return view('maintenance');
            });

            Route::get('/tender', function () {
                return view('tender');
            });

});
