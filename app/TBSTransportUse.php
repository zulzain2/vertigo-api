<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TBSTransportUse extends Model
{
    use Notifiable;
    protected $table = 'tbs_transport_uses';
    public $incrementing = FALSE;

    public function tbs() {
        return $this->hasOne('App\TBS', 'id', 'id_tbs');
    }
}
