<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EBS extends Model
{
    use Notifiable;
    protected $table = 'ebs';
    public $incrementing = FALSE;

    public function ebsstaffuse() {
        return $this->hasMany('App\EBSStaffUse', 'id_ebs', 'id');
    }

    public function ebsequipmentuse() {
        return $this->hasMany('App\EBSEquipmentUse', 'id_ebs', 'id');
    }
}
