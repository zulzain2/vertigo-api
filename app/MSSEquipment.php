<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MSSEquipment extends Model
{
    use Notifiable;
    protected $table = 'mss_equipment';
    public $incrementing = FALSE;

    public function mss() {
        return $this->hasOne('App\MSS', 'id', 'id_mss');
    }
}
