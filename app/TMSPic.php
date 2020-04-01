<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TMSPic extends Model
{
    use Notifiable;
    protected $table = 'tms_pics';
    public $incrementing = FALSE;

    public function tms() {
        return $this->hasOne('App\TMS', 'id', 'id_tms');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'id_user');
    }


}
