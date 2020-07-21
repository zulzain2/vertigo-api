<?php

namespace App\Http\Controllers;

use App\EBS;
use App\MSS;
use App\TBS;
use App\TMS;
use App\User;
use App\Equipment;
use App\Transport;
use App\SASComment;
use App\DocumentLog;
use App\Notification;
use App\SASStaffAssign;
use App\MaintenanceTask;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->limit(50)->get();  

        if($request->id_staff && $request->module && $request->month) 
        {
            if($request->month == '01'){
                $monthName = 'January';
            }
            elseif($request->month == '02'){
                $monthName = 'February';
            }
            elseif($request->month == '03'){
                $monthName = 'March';
            }
            elseif($request->month == '04'){
                $monthName = 'April';
            }
            elseif($request->month == '05'){
                $monthName = 'May';
            }
            elseif($request->month == '06'){
                $monthName = 'June';
            }
            elseif($request->month == '07'){
                $monthName = 'July';
            }
            elseif($request->month == '08'){
                $monthName = 'August';
            }
            elseif($request->month == '09'){
                $monthName = 'September';
            }
            elseif($request->month == '10'){
                $monthName = 'October';
            }
            elseif($request->month == '11'){
                $monthName = 'November';
            }
            elseif($request->month == '12'){
                $monthName = 'December';
            }
    
            $users = User::where('status', '=' , '1')->get();
    
            $user = User::find($request->id_staff);
            $module = $request->module;
            $month = $request->month;
            $year = date("y");

            if($request->module == 'sas')
            {

                //1st Box
                $createdTasks           = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        // ->where('status' , '=' , 'Created')
                                                        ->where('created_at' , '>=' , ''.date("y").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->get();
                //2nd Box
                $completedTasks         = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Task Finish')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->orWhere('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Early Completion')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->get();

                $totalAssignedTask      = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Created')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->orWhere('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Approved')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->orWhere('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Acknowledge')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->get();
                //3rd Box
                $totalRegisteredTasks   = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01 00:00:00')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).' 11:59:59')
                                                        ->get();
                //4rd Box
                $ongoingTasks           = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Task Start')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->get();

                $totalIncompletes       = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Cancellation')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->orWhere('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Resistance')
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->get();


                $moduleName = 'Staff Assignment System';
                
            }
            elseif($request->module == 'ebs')
            {


                //1st Box
                $createdTasks           = EBS::whereHas('ebsstaffuse' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            // ->where('status' , '=' , 'Booking Confirmed')
                                            ->where('created_at' , '>=' , ''.date("y").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                //2nd Box
                $completedTasks         = EBS::whereHas('ebsstaffuse' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Ended')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();
                
                $totalAssignedTask      = EBS::whereHas('ebsstaffuse' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Confirmed')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('ebsstaffuse' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Start')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('ebsstaffuse' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Ended')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                //3rd Box
                $totalRegisteredTasks   = EBS::whereHas('ebsstaffuse' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01 00:00:00')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).' 11:59:59')
                                            ->get();

                 //4rd Box
                 $ongoingTasks           = EBS::whereHas('ebsstaffuse' , function ($query) use ($request) {
                                                    $query->where('id_user' , $request->id_staff);
                                                })
                                                ->where('status' , '=' , 'Booking Start')
                                                ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                ->get();

                $totalIncompletes       = EBS::whereHas('ebsstaffuse' , function ($query) use ($request) {
                                                    $query->where('id_user' , $request->id_staff);
                                                })
                                                ->where('status' , '=' , 'Cancellation')
                                                ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                ->orWhereHas('ebsstaffuse' , function ($query) use ($request) {
                                                    $query->where('id_user' , $request->id_staff);
                                                })
                                                ->where('status' , '=' , 'Resistance')
                                                ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                ->get();

                $moduleName = 'Equipment Booking System';
                
            }
            elseif($request->module == 'tbs')
            {


                //1st Box
                $createdTasks           = TBS::whereHas('tbsdriver' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            // ->where('status' , '=' , 'Booking Confirmed')
                                            ->where('created_at' , '>=' , ''.date("y").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                //2nd Box
                $completedTasks         = TBS::whereHas('tbsdriver' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Ended')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();
                
                $totalAssignedTask      = TBS::whereHas('tbsdriver' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Confirmed')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('tbsdriver' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Start')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('tbsdriver' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Booking Ended')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                //3rd Box
                $totalRegisteredTasks   = TBS::whereHas('tbsdriver' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01 00:00:00')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).' 11:59:59')
                                            ->get();

                 //4rd Box
                 $ongoingTasks           = TBS::whereHas('tbsdriver' , function ($query) use ($request) {
                                                    $query->where('id_user' , $request->id_staff);
                                                })
                                                ->where('status' , '=' , 'Booking Start')
                                                ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                ->get();

                $totalIncompletes       = TBS::whereHas('tbsdriver' , function ($query) use ($request) {
                                                    $query->where('id_user' , $request->id_staff);
                                                })
                                                ->where('status' , '=' , 'Cancellation')
                                                ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                ->orWhereHas('tbsdriver' , function ($query) use ($request) {
                                                    $query->where('id_user' , $request->id_staff);
                                                })
                                                ->where('status' , '=' , 'Resistance')
                                                ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                                ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                ->get();

                $moduleName = 'Transport Booking System';

            }
            elseif($request->module == 'mss')
            {

                 //1st Box
                 $createdTasks          = MSS::whereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        // ->where('status' , '=' , 'Created')
                                        ->where('created_at' , '>=' , ''.date("y").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->get();

                //2nd Box
                $completedTasks         = MSS::whereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('status' , '=' , 'Finish')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->orWhereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('status' , '=' , 'Early Completion')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->get();
                                        

                $totalAssignedTask      = MSS::whereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('status' , '=' , 'Created')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->orWhereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('status' , '=' , 'acknowledge')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->orWhereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('status' , '=' , 'Task Start')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->orWhereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('status' , '=' , 'Early Completion')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->get();

                //3rd Box
                $totalRegisteredTasks   = MSS::whereHas('msspic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01 00:00:00')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).' 11:59:59')
                                        ->get();

                //4rd Box
                $ongoingTasks           = MSS::whereHas('msspic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Task Start')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                $totalIncompletes       = MSS::whereHas('msspic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Cancellation')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('msspic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Resistance')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();
                    
                $moduleName = 'Maintenance Schedule System';

            }
            elseif($request->module == 'tms')
            {

                //1st Box
                $createdTasks          = TMS::whereHas('pic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        // ->where('status' , '=' , 'Inquiry Created')
                                        ->where('created_at' , '>=' , ''.date("y").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->get();

                //2nd Box
                $completedTasks         = TMS::whereHas('pic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('status' , '=' , 'Finish & Sent for Verification')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->orwhereHas('pic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('clerk_verify_status' , '=' , 'Verified')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->orwhereHas('pic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('manager_verify_status' , '=' , 'Verified')
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                        ->get();
                                

                $totalAssignedTask      = TMS::whereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Session Set')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Acknowledge')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Task Start')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Finish & Sent for Verification')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('clerk_verify_status' , '=' , 'Verified')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->orWhereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('manager_verify_status' , '=' , 'Verified')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                //3rd Box
                $totalRegisteredTasks   = TMS::whereHas('pic' , function ($query) use ($request) {
                                            $query->where('id_user' , $request->id_staff);
                                        })
                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01 00:00:00')
                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).' 11:59:59')
                                        ->get();

                //4rd Box
                $ongoingTasks           = TMS::whereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('status' , '=' , 'Task Start')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                $totalIncompletes       = TMS::whereHas('pic' , function ($query) use ($request) {
                                                $query->where('id_user' , $request->id_staff);
                                            })
                                            ->where('finish_task' , '=' , 'No')
                                            ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01')
                                            ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                            ->get();

                $moduleName = 'Tender Management System';

            }
            else
            {
                
            }
    
            return view('dashboard2')
            ->with(compact('totalAssignedTask' , 'totalRegisteredTasks' , 'totalIncompletes' ,
            'users' , 'user' , 'module' , 'moduleName' , 'month' , 'monthName' , 
            'createdTasks'  , 'completedTasks' , 'ongoingTasks' , 'documentLogs')); 
        }
        else
        {
            $users = User::where('status', '=' , '1')->get();
        
            return view('dashboard2')->with(compact('users' , 'documentLogs'));
        }
        

    }

    public function searchDashboard(Request $request)
    {
      
        $request->validate([
            'id_staff'           => 'required',
            'module'            => 'required',
            'month'            => 'required',
        ]);
        
        return redirect('dashboard2?id_staff='.$request->id_staff.'&module='.$request->module.'&month='.$request->month.'');
       
    }

    public function staff(Request $request)
    {

        $sascomments = SASComment::orderBy('created_at' , 'DESC')->get();

        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'SAS')->limit(50)->get();

        $users = User::where('status' , '=' , 1)->get();

        if($request->staff)
        {
            $event = SASStaffAssign::where('id_user' , '=' , $request->staff)->with('sas')->orderBy('start_date' , 'DESC')->get();  

            $curr_user = User::find($request->staff);

            return view('staffAssignmentSystem2')->with(compact('documentLogs' , 'sascomments' , 'event' , 'users' , 'curr_user'));
        }
        else
        {
            $event = SASStaffAssign::with('sas')->orderBy('start_date' , 'DESC')->get();

            return view('staffAssignmentSystem2')->with(compact('documentLogs' , 'sascomments' , 'event' , 'users' ));
        }

        
    }

    public function showSAS($id_sasstaffassign)
    {
        $sasas = SASStaffAssign::find($id_sasstaffassign);

        return view('sas.showModal' , compact('sasas'));
    }

    public function searchSAS(Request $request)
    {
        $request->validate([
            'staff'           => 'required'
        ]);

        return redirect('staff2?staff='.$request->staff.'');
    }

    public function equipment(Request $request)
    {
        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'EBS')->limit(50)->get();

        $equipments = Equipment::where('status' , 'enable')->get();

        if ($request->equipment) {

            $event = EBS::whereHas('ebsequipmentuse' , function ($query) use ($request) {
                $query->where('id_equipment' , $request->equipment);
            })->orderBy('start_date' , 'DESC')->get();

         

            $curr_equipment = Equipment::find($request->equipment);

            return view('equipment2')->with(compact('documentLogs' , 'event' , 'equipments' , 'curr_equipment'));

        } else {

            $event = EBS::orderBy('start_date' , 'DESC')->get();

            return view('equipment2')->with(compact('documentLogs' , 'event' , 'equipments'));

        }
        
    }

    public function showEBS($id_ebs)
    {
        $ebs = EBS::find($id_ebs);

        return view('ebs.showModal' , compact('ebs'));
    }

    public function searchEBS(Request $request)
    {
        $request->validate([
            'equipment'           => 'required'
        ]);

        return redirect('equipment2?equipment='.$request->equipment.'');
    }

    public function transport(Request $request)
    {

        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'TBS')->limit(50)->get();

        $transports = Transport::where('status' , 'enable')->get();

        if($request->transport)
        {
            $curr_transport = Transport::find($request->transport);

            $event = TBS::whereHas('tbstransportuse' , function ($query) use ($request) {
                $query->where('id_transport' , $request->transport);
            })->orderBy('start_date' , 'DESC')->get();


            return view('transport2')->with(compact('documentLogs' , 'event' , 'transports' , 'curr_transport'));
        }
        else
        {
            $event = TBS::orderBy('start_date' , 'DESC')->get();

            return view('transport2')->with(compact('documentLogs' , 'event' , 'transports'));
        }
        
    }

    public function showTBS($id_tbs)
    {
        $tbs = TBS::find($id_tbs);

        return view('tbs.showModal' , compact('tbs'));
    }

    public function searchTBS(Request $request)
    {
        $request->validate([
            'transport'           => 'required'
        ]);

        return redirect('transport2?transport='.$request->transport.'');
    }

    public function maintenance(Request $request)
    {

        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'MSS')->limit(50)->get();

        

        $tasks = MaintenanceTask::where('status' , '1')->get();

        if ($request->maintenance) 
        {
            $event = MSS::whereHas('msstask' , function ($query) use ($request) {
                $query->where('id_task' , $request->maintenance);
            })->orderBy('start_date' , 'DESC')->get();

            $curr_task = MaintenanceTask::find($request->maintenance);

            return view('maintenance2')->with(compact('documentLogs' , 'event' , 'tasks' , 'curr_task'));
        } 
        else 
        {
            $event = MSS::orderBy('start_date' , 'DESC')->get();

            return view('maintenance2')->with(compact('documentLogs' , 'event' , 'tasks'));
        }
  
    }

    public function showMSS($id_mss)
    {
        $mss = MSS::find($id_mss);

        return view('mss.showModal' , compact('mss'));
    }

    public function searchMSS(Request $request)
    {
        $request->validate([
            'maintenance'           => 'required'
        ]);

        return redirect('maintenance2?maintenance='.$request->maintenance.'');
    }

    public function tender(Request $request)
    {
        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'TMS')->limit(50)->get();

        $tms = TMS::orderBy('sitevisit_start_date' , 'DESC')->get();

        if ($request->tender) {
            $event = TMS::where('id' , '=' , $request->tender)->orderBy('sitevisit_start_date' , 'DESC')->get();

            $curr_tender = TMS::find($request->tender);

            return view('tender2')->with(compact('documentLogs' , 'event' , 'tms' , 'curr_tender'));
        } else {
            $event = TMS::orderBy('sitevisit_start_date' , 'DESC')->get();

            return view('tender2')->with(compact('documentLogs' , 'event' , 'tms'));
        }
        
        
    }

    public function showTMS($id_tms)
    {
        $tms = TMS::find($id_tms);

        return view('tms.showModal' , compact('tms'));
    }

    public function searchTMS(Request $request)
    {
        $request->validate([
            'tender'           => 'required'
        ]);

        return redirect('tender2?tender='.$request->tender.'');
    }
}
