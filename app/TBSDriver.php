<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TBSDriver extends Model
{
    use Notifiable;
    protected $table = 'tbs_drivers';
    public $incrementing = FALSE;

    public function tbs() {
        return $this->hasOne('App\TBS', 'id', 'id_tbs');
    }
}
