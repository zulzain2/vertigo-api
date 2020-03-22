<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MaintenanceTask extends Model
{
    use Notifiable;
    protected $table = 'maintenance_tasks';
    public $incrementing = FALSE;
}
