<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EquipmentCategory extends Model
{
    use Notifiable;
    protected $table = 'equipment_categories';
    public $incrementing = FALSE;

    public function transport() {
        return $this->hasMany('App\Transport', 'id_trans_category', 'id');
    }
}
