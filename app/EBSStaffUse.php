<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EBSStaffUse extends Model
{
    use Notifiable;
    protected $table = 'ebs_staff_uses';
    public $incrementing = FALSE;

    public function ebs() {
        return $this->hasOne('App\EBS', 'id', 'id_ebs');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
