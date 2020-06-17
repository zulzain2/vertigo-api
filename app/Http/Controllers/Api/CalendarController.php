<?php

namespace App\Http\Controllers\Api;

use App\Equipment;
use App\Http\Controllers\Controller;
use App\Http\Resources\Calendar\EBS\Equipment as EBSResource;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $equipments = Equipment::latest()
            ->get();

        return response()->json([
            'start' => $start_date,
            'end' => $end_date,
            'data' => EBSResource::collection($equipments),
        ]);
    }
}
