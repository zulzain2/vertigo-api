<?php

namespace App\Http\Controllers\Api;

use App\Equipment;
use App\Http\Controllers\Controller;
use App\Http\Resources\Calendar\EBS\Equipment as EBSResource;
use App\Http\Resources\Calendar\TBS\Transport as TBSResource;
use App\Http\Resources\Calendar\MSS\MaintenanceTask as MSSResource;
use App\Http\Resources\Calendar\SAS\User as SASResource;
use App\Http\Resources\Calendar\TMS\TMS as TMSResource;
use App\MaintenanceTask;
use App\TMS;
use App\Transport;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function listEBS(Request $request)
    {
        if ($request->has('start_date')) {
            $start_date = date('Y-m-d', strtotime($request->start_date));
        } else {
            $start_date = date('Y-m-d', strtotime(now()));
        }
        $end_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
        $equipments = Equipment::orderBy('name')
        ->get();

        return response()->json([
            'start' => $start_date,
            'end' => $end_date,
            'data' => EBSResource::collection($equipments),
        ]);
    }

    public function listTBS(Request $request)
    {

        if ($request->has('start_date')) {
            $start_date = date('Y-m-d', strtotime($request->start_date));
        } else {
            $start_date = date('Y-m-d', strtotime(now()));
        }
        $end_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
        $transports = Transport::latest()
            ->get();

        return response()->json([
            'start' => $start_date,
            'end' => $end_date,
            'data' => TBSResource::collection($transports),
        ]);
    }

    public function listTMS(Request $request)
    {

        if ($request->has('month')) {
            $month = date('m', strtotime($request->month));
        } else {
            $month = date('m', strtotime(now()));
        }
        $tenders = TMS::whereMonth('sitevisit_start_date', $month)
            ->groupBy('vtsb_num')
            ->get();

        return response()->json([
            'month' => $month,
            'data' => TMSResource::collection($tenders),
        ]);
    }

    public function listMSS(Request $request)
    {

        if ($request->has('start_date')) {
            $start_date = date('Y-m-d', strtotime($request->start_date));
        } else {
            $start_date = date('Y-m-d', strtotime(now()));
        }
        $end_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
        $tasks = MaintenanceTask::latest()
            ->get();

        return response()->json([
            'start' => $start_date,
            'end' => $end_date,
            'data' => MSSResource::collection($tasks),
        ]);
    }

    public function listSAS(Request $request)
    {

        if ($request->has('start_date')) {
            $start_date = date('Y-m-d', strtotime($request->start_date));
        } else {
            $start_date = date('Y-m-d', strtotime(now()));
        }
        $end_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
        $staffs = User::whereHas('role', function ($query) {
            return $query->whereIn('level', [2, 3, 4, 5, 6]);
        })
            ->latest()
            ->get();

        return response()->json([
            'start' => $start_date,
            'end' => $end_date,
            'data' => SASResource::collection($staffs),
        ]);
    }

    public function listDay(Request $request)
    {
        if ($request->has('month')) {
            $start = Carbon::createFromDate(date('o'), $request->month, date('d'))->firstOfMonth();
            $end = Carbon::createFromDate(date('o'), $request->month, date('d'))->lastOfMonth();
        } else {
            $start = Carbon::now()->firstOfMonth();
            $end = Carbon::now()->lastOfMonth();
        }

        $days = [];
        while ($start <= $end) {
            array_push($days, [
                'label' => $start->format('d M Y'),
                'value' => $start->format('Y-m-d')
            ]);
            $start->addDay();
        }

        return response()->json(['data' => $days]);
    }
}
