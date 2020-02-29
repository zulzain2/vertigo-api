<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EBSEquipmentUse extends Model
{
    use Notifiable;
    protected $table = 'ebs_equipment_uses';
    public $incrementing = FALSE;
}
