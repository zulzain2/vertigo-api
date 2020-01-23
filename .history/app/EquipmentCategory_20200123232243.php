<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EquipmentCategory extends Model
{
    use Notifiable;
    protected $table = 'roles';
    public $incrementing = FALSE;
}
