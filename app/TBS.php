<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TBS extends Model
{
    use Notifiable;
    protected $table = 'tbs';
    public $incrementing = FALSE;

    public function tbstransportuse() {
        return $this->hasMany('App\TBSTransportUse', 'id_tbs', 'id');
    }

    public function tbsdriver() {
        return $this->hasMany('App\TBSDriver', 'id_tbs', 'id');
    }
}
