<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SASStaffAssign extends Model
{
    use Notifiable;
    protected $table = 'equipments';
    public $incrementing = FALSE;
}
