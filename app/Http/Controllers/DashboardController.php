<?php

namespace App\Http\Controllers;

use App\User;
use App\SASComment;
use App\DocumentLog;
use App\Notification;
use App\SASStaffAssign;
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

    
                $createdTasks           = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        ->where('status' , '=' , 'Created')
                                                        ->where('created_at' , '>=' , ''.date("y").'-'.$month.'-01')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).'')
                                                        ->get();

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

                $totalRegisteredTasks   = SASStaffAssign::where('id_user' , '=' , $request->id_staff)
                                                        ->where('created_at' , '>=' , ''.date("yy").'-'.$month.'-01 00:00:00')
                                                        ->where('created_at' , '<=' , ''.date("yy").'-'.$month.'-'.date("t" , strtotime(''.$year.'-'.$month.'-15')).' 11:59:59')
                                                        ->get();

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
    
            }
            elseif($request->module == 'tbs')
            {
                
            }
            elseif($request->module == 'mss')
            {
                
            }
            elseif($request->module == 'tms')
            {
                
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

    public function staff()
    {
        $sascomments = SASComment::orderBy('created_at' , 'DESC')->get();

        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'SAS')->limit(50)->get();

        return view('staffAssignmentSystem2')->with(compact('documentLogs' , 'sascomments'));
    }

    public function equipment()
    {
        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'EBS')->limit(50)->get();

        return view('equipment2')->with(compact('documentLogs'));
    }

    public function transport()
    {
        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'TBS')->limit(50)->get();

        return view('transport2')->with(compact('documentLogs'));
    }

    public function maintenance()
    {
        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'MSS')->limit(50)->get();

        return view('maintenance2')->with(compact('documentLogs'));
    }

    public function tender()
    {
        $documentLogs = DocumentLog::orderBy('created_at' , 'DESC')->where('document_type' , '=' , 'TMS')->limit(50)->get();
        
        return view('tender2')->with(compact('documentLogs'));
    }
}
