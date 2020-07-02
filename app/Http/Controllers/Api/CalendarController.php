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

class CalendarController extends Controller
{
    public function listEBS(Request $request)
    {
        if ($request->category_id != 'none') {
            $equipments = Equipment::orderBy('name')
                ->whereIdEquipCategory($request->category_id)
                ->get();
        } else {
            $equipments = Equipment::orderBy('name')
                ->get();
        }

        return response()->json([
            'data' => EBSResource::collection($equipments),
        ]);
    }

    public function listTBS(Request $request)
    {

        $transports = Transport::latest()
            ->get();

        return response()->json([
            'data' => TBSResource::collection($transports),
        ]);
    }

    public function listTMS(Request $request)
    {
        $tenders = TMS::whereMonth('sitevisit_start_date', $request->month)
            ->groupBy('vtsb_num')
            ->get();

        return response()->json([
            'data' => TMSResource::collection($tenders),
        ]);
    }

    public function listMSS(Request $request)
    {
        $tasks = MaintenanceTask::orderBy('name')
            ->get();

        return response()->json([
            'data' => MSSResource::collection($tasks),
        ]);
    }

    public function listSAS(Request $request)
    {
        $staffs = User::whereHas('role', function ($query) {
            return $query->whereIn('level', [2, 3, 4, 5, 6]);
        })
            ->latest()
            ->get();

        return response()->json([
            'data' => SASResource::collection($staffs),
        ]);
    }

    public function listDay(Request $request)
    {
        $start = Carbon::createFromDate(date('o'), $request->month, date('d'))->firstOfMonth();
        $end = Carbon::createFromDate(date('o'), $request->month, date('d'))->lastOfMonth();

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
