<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MSSPic extends Model
{
    use Notifiable;
    protected $table = 'mss_pics';
    public $incrementing = FALSE;

    public function mss() {
        return $this->hasOne('App\MSS', 'id', 'id_mss');
    }
}
