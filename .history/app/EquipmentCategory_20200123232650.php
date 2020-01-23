<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EquipmentCategory extends Model
{
    use Notifiable;
    protected $table = 'equipment_categories';
    public $incrementing = FALSE;

    public function equipment() {
        return $this->hasMany('App\Equipment', 'id_equip_category', 'id');
    }
}
