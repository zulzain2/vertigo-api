<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MaintenanceTask extends Model
{
    use Notifiable;
    protected $table = 'maintenance_tasks';
    public $incrementing = FALSE;

    public function mssDaily($date)
    {
        return $this->belongsToMany('App\MSS', 'mss_tasks', 'id_task', 'id_mss')
        ->whereRaw('? between date(mss.start_date) and mss.end_date', [$date])
        ->get();
    }

    public function mssMonthly($month)
    {
        return $this->belongsToMany('App\MSS', 'mss_tasks', 'id_task', 'id_mss')
        ->whereMonth('mss.start_date', $month)
        ->get();
    }
}
