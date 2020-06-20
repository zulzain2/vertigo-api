<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MaintenanceTask extends Model
{
    use Notifiable;
    protected $table = 'maintenance_tasks';
    public $incrementing = FALSE;

    public function mss($start_date, $end_date)
    {
        return $this->belongsToMany('App\MSS', 'mss_tasks', 'id_task', 'id_mss')
            ->wherePivot('created_at', '>=', $start_date)
            ->wherePivot('created_at', '<', $end_date)
            ->get();
    }
}
