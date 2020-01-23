<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transport extends Model
{
    use Notifiable;
    protected $table = 'transports';
    public $incrementing = FALSE;

    public function user() {
        return $this->hasMany('App\User', 'id_role', 'id');
    }
}
