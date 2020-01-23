<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TransportCategory extends Model
{
    use Notifiable;
    protected $table = 'transport_categories';
    public $incrementing = FALSE;

    public function transport() {
        return $this->hasMany('App\Transport', 'id', '');
    }
}
