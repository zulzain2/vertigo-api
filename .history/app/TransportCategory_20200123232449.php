<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TransportCategory extends Model
{
    use Notifiable;
    protected $table = 'transport_categories';
    public $incrementing = FALSE;

    public function transportcategory() {
        return $this->hasOne('App\TransportCategory', 'id', 'id_trans_category');
    }
}
