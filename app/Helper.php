<?php

/**
 * Get start time & end time for apps calendar
 *
 * * @param request_date
 * * @param start_date
 * * @param end_date
 *
 * @return array
 */
if (!function_exists('getStartEndTime')) {
    function getStartEndTime($request_date, $start_date, $end_date)
    {
        $hour = intval(date('H', strtotime($start_date)));
        $hour2 = intval(date('H', strtotime($end_date)));
        $duration = Carbon\Carbon::parse($start_date)->diffInHours($end_date);
        $equalToStart = $request_date == date('Y-m-d', strtotime($start_date));
        $equalToEnd = $request_date == date('Y-m-d', strtotime($end_date));

        $start_default = [
            'hour' => 0,
            'minute' => 0
        ];
        $start_ori = [
            'hour' => intval(date('H', strtotime($start_date))),
            'minute' => intval(date('i', strtotime($start_date))),
        ];
        $end_default = [
            'hour' => 23,
            'minute' => 59
        ];
        $end_ori = [
            'hour' => intval(date('H', strtotime($end_date))),
            'minute' => intval(date('i', strtotime($end_date))),
        ];
        if ($hour <= $hour2) {
            if ($duration <= 24) {
                $start_time = $start_ori;
                $end_time = $end_ori;
            } else {
                if ($equalToStart) {
                    $start_time = $start_ori;
                    $end_time = $end_default;
                } elseif ($equalToEnd) {
                    $start_time = $start_default;
                    $end_time = $end_ori;
                } else {
                    $start_time = $start_default;
                    $end_time = $end_default;
                }
            }
        } else {
            if ($duration <= 24) {
                if ($equalToStart) {
                    $start_time = $start_ori;
                    $end_time = $end_default;
                } else {
                    $start_time = $start_default;
                    $end_time = $end_ori;
                }
            } else {
                if ($equalToStart) {
                    $start_time = $start_ori;
                    $end_time = $end_default;
                } elseif ($equalToEnd) {
                    $start_time = $start_default;
                    $end_time = $end_ori;
                } else {
                    $start_time = $start_default;
                    $end_time = $end_default;
                }
            }
        }

        return [
            'duration' => $duration,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];
    }
}
