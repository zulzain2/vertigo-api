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
Route::post('/login', 'Api\AuthController@login');



Route::middleware('auth:api')->group(function () {
    //Register
    Route::post('/register', 'Api\AuthController@register');
    //User
    Route::post('/user/storeUser', 'Api\UserController@storeUser');
    Route::put('user/updatePassword/{id}', 'Api\UserController@updatePassword');
    Route::resource('user', 'Api\UserController');

    //Role
    Route::resource('role', 'Api\RoleController');

    //Equipment
    Route::post('/equipment/storeEquipment', 'Api\EquipmentController@storeEquipment');
    Route::get('/equipment/getEquimentCategories', 'Api\EquipmentController@getEquimentCategories')->name('equipment.getEquimentCategories');
    Route::get('/equipment/getAvailableEquipment/{date_start}/{date_end}', 'Api\EquipmentController@getAvailableEquipment')->name('equipment.getAvailableEquipment');
    Route::resource('equipment', 'Api\EquipmentController');

    //Transport
    Route::post('/transport/storeTransport', 'Api\TransportController@storeTransport');
    Route::get('/transport/getTransportCategories', 'Api\TransportController@getTransportCategories')->name('transport.getTransportCategories');
    Route::get('/transport/getAvailableTransport/{date_start}/{date_end}', 'Api\TransportController@getAvailableTransport')->name('transport.getAvailableTransport');
    Route::resource('transport', 'Api\TransportController');

    //DASHBOARD SAS
    Route::get('/sas/dashDate', 'Api\SASController@dashDate')->name('sas.dashDate');
    //SAS
    Route::post('/sas/commentSas/{id}', 'Api\SASController@commentSas')->name('sas.commentSas');
    Route::get('/sas/commentShowBySas/{id}', 'Api\SASController@commentShowBySas')->name('sas.commentShowBySas');
    Route::get('/sas/commentShowBySassa/{id}', 'Api\SASController@commentShowBySassa')->name('sas.commentShowBySassa');
    Route::post('/sas/endTask/{id}', 'Api\SASController@endTask')->name('sas.endTask');
    Route::post('/sas/updateProgress/{id}', 'Api\SASController@updateProgress')->name('sas.updateProgress');
    Route::post('/sas/startTask/{id}', 'Api\SASController@startTask')->name('sas.startTask');
    Route::get('/sas/acknowledge/{id}', 'Api\SASController@acknowledge')->name('sas.acknowledge');
    Route::get('/sas/approve/{id}', 'Api\SASController@approve')->name('sas.approve');
    Route::get('/sas/reject/{id}', 'Api\SASController@reject')->name('sas.reject');
    Route::get('/sas/getAvailableStaff/{date_start}/{date_end}', 'Api\SASController@getAvailableStaff')->name('sas.getAvailableStaff');
    Route::post('/sas/addNewTask', 'Api\SASController@addNewTask')->name('sas.addNewTask');
    Route::get('/sas/getIdStaffAssign', 'Api\SASController@getIdStaffAssign');
    Route::resource('sas', 'Api\SASController');

    //DASHBOARD EBS
    Route::get('/ebs/dashDate', 'Api\EBSController@dashDate')->name('ebs.dashDate');
    //EBS
    Route::post('/ebs/startBooking/{id}', 'Api\EBSController@startBooking')->name('ebs.startBooking');
    Route::post('/ebs/updateProgress/{id}', 'Api\EBSController@updateProgress')->name('ebs.updateProgress');
    Route::post('/ebs/endBooking/{id}', 'Api\EBSController@endBooking')->name('ebs.endBooking');
    Route::resource('ebs', 'Api\EBSController');

    //DASHBOARD TBS
    Route::get('/tbs/dashDate', 'Api\TBSController@dashDate')->name('tbs.dashDate');
    //TBS
    Route::post('/tbs/startBooking/{id}', 'Api\TBSController@startBooking')->name('tbs.startBooking');
    Route::post('/tbs/updateProgress/{id}', 'Api\TBSController@updateProgress')->name('tbs.updateProgress');
    Route::post('/tbs/endBooking/{id}', 'Api\TBSController@endBooking')->name('tbs.endBooking');
    Route::resource('tbs', 'Api\TBSController');

    //DASHBOARD MSS
    Route::get('/mss/dashDate', 'Api\MSSController@dashDate')->name('mss.dashDate');
    //MSS
    Route::get('/mss/getMaintenanceTask', 'Api\MSSController@getMaintenanceTask')->name('mss.getMaintenanceTask');
    Route::post('/mss/endMaintenance/{id}', 'Api\MSSController@endMaintenance')->name('mss.endMaintenance');
    Route::post('/mss/updateProgress/{id}', 'Api\MSSController@updateProgress')->name('mss.updateProgress');
    Route::post('/mss/startMaintenance/{id}', 'Api\MSSController@startMaintenance')->name('mss.startMaintenance');
    Route::get('/mss/acknowledge/{id}', 'Api\MSSController@acknowledge')->name('mss.acknowledge');
    Route::get('/mss/getAvailableStaff/{date_start}/{date_end}', 'Api\MSSController@getAvailableStaff')->name('mss.getAvailableStaff');
    Route::post('/mss/addNewMaintenance', 'Api\MSSController@addNewMaintenance')->name('mss.addNewMaintenance');
    Route::resource('mss', 'Api\MSSController');

    //DASHBOARD TMS
    Route::get('/tms/dashDate', 'Api\TMSController@dashDate')->name('tms.dashDate');
    //TMS
    Route::get('/tms/taskVerifyManager/{id_tms}', 'Api\TMSController@taskVerifyManager')->name('tms.taskVerifyManager');
    Route::get('/tms/taskVerifyClerk/{id_tms}', 'Api\TMSController@taskVerifyClerk')->name('tms.taskVerifyClerk');
    Route::post('/tms/taskCompletion/{id_tms}', 'Api\TMSController@taskCompletion')->name('tms.taskCompletion');
    Route::post('/tms/startVisit/{id_tms}', 'Api\TMSController@startVisit')->name('tms.startVisit');
    Route::get('/tms/acknowledge/{id_tms}', 'Api\TMSController@acknowledge')->name('tms.acknowledge');
    Route::post('/tms/addNewSession/{id_tms}', 'Api\TMSController@addNewSession')->name('tms.addNewSession');
    Route::post('/tms/addNewInquiry', 'Api\TMSController@addNewInquiry')->name('tms.addNewInquiry');
    Route::resource('tms', 'Api\TMSController');

    //NOTIFICATIONS
    Route::get('/notification/getPending', 'Api\NotificationController@getPending')->name('notification.getPending');
    Route::get('/notification/getSend', 'Api\NotificationController@getSend')->name('notification.getSend');
    Route::get('/notification/getReceived', 'Api\NotificationController@getReceived')->name('notification.getReceived');
    Route::get('/notification/getRead', 'Api\NotificationController@getRead')->name('notification.getRead');
    Route::get('/notification/getFailed', 'Api\NotificationController@getFailed')->name('notification.getFailed');
    Route::get('/notification/getByUser', 'Api\NotificationController@getByUser')->name('notification.getByUser');
    Route::get('/notification/changeToRead/{id}', 'Api\NotificationController@changeToRead')->name('notification.changeToRead');
    Route::resource('notification', 'Api\NotificationController');

    // By Ejul
    Route::namespace('Api')->group(function () {
        Route::prefix('calendar')->group(function () {
            Route::get('list-ebs', 'CalendarController@listEBS');
            Route::get('list-tbs', 'CalendarController@listTBS');
            Route::get('list-tms', 'CalendarController@listTMS');
            Route::get('list-mss', 'CalendarController@listMSS');
            Route::get('list-sas', 'CalendarController@listSAS');
            Route::get('list-day', 'CalendarController@listDay');
        });
    });
});
