<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Login
Route::post('/login' , 'Api\AuthController@login');

Route::middleware('auth:api')->group(function () {
    //User
    Route::resource('user', 'Api\UserController');
    //Register
    Route::post('/register' , 'Api\AuthController@register');
    //Role
    Route::resource('role', 'Api\RoleController');
    //Equipment
    Route::resource('equipment', 'Api\EquipmentController');
    //Transport
    Route::resource('transport', 'Api\TransportController');
    //SAS
    Route::post('/sas/endTask/{id}', 'Api\SASController@endTask')->name('sas.endTask');
    Route::post('/sas/updateProgress/{id}', 'Api\SASController@updateProgress')->name('sas.updateProgress');
    Route::post('/sas/startTask/{id}', 'Api\SASController@startTask')->name('sas.startTask');
    Route::get('/sas/acknowledge/{id}', 'Api\SASController@acknowledge')->name('sas.acknowledge');
    Route::get('/sas/approve/{id}', 'Api\SASController@approve')->name('sas.approve');
    Route::get('/sas/reject/{id}', 'Api\SASController@reject')->name('sas.reject');
    Route::get('/sas/getAvailableStaff/{date_start}/{date_end}', 'Api\SASController@getAvailableStaff')->name('sas.getAvailableStaff');
    Route::post('/sas/addNewTask', 'Api\SASController@addNewTask')->name('sas.addNewTask');
    Route::resource('sas', 'Api\SASController');
    //EBS
    Route::resource('ebs', 'Api\EBSController');
});

