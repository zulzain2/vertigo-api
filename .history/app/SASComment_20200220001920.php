<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SASComment extends Model
{
    use Notifiable;
    protected $table = 'sas_comments';
    public $incrementing = FALSE;

    public function sasstaffassign() {
        return $this->hasMany('App\SASComment', 'id_sas_staff_assign', 'id');
    }
}
