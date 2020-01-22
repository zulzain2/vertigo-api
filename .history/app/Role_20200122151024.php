<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;
    protected $table = 'roles';
    public $incrementing = FALSE;

    public function user() {
        return $this->hasMany('App\User', 'id_role', 'id');
    }
}
