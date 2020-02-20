<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SASStaffAssign extends Model
{
    use Notifiable;
    protected $table = 'sas_staff_assigns';
    public $incrementing = FALSE;

    public function sas() {
        return $this->hasOne('App\sas', 'id', 'id_sas');
    }
}
