<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;
    protected $table = 'roles';
    public $incrementing = FALSE;

    public function role() {
        return $this->hasOne('App\Role', 'id', 'id_role');
    }
}
