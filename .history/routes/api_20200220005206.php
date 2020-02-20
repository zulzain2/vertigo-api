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
    Route::post('/sas/addNewTask', 'AuditPlanController@fetch')->name('auditplan.fetch');
    Route::resource('sas', 'Api\SASController');
});

