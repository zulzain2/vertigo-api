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
        return $this->hasOne('App\SASStaffAssign', 'id', 'id_sas_staff_assign');
    }

    public function usercomment() {
        return $this->hasOne('App\User', 'id', 'id_user_comment');
    }

    
}
