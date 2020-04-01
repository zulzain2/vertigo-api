<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EBSEquipmentUse extends Model
{
    use Notifiable;
    protected $table = 'ebs_equipment_uses';
    public $incrementing = FALSE;

    public function ebs() {
        return $this->hasOne('App\EBS', 'id', 'id_ebs');
    }

    public function equipment() {
        return $this->hasOne('App\Equipment', 'id', 'id_equipment');
    }
}
