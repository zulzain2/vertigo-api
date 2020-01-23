<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipment extends Model
{
    use Notifiable;
    protected $table = 'equipments';
    public $incrementing = FALSE;

    public function transportcategory() {
        return $this->hasOne('App\TransportCategory', 'id', 'id_trans_category');
    }
}
