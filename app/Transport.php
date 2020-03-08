<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transport extends Model
{
    use Notifiable;
    protected $table = 'transports';
    public $incrementing = FALSE;

    public function getImgPathAttribute($value)
    {
        $url = URL::to($value);
        return $url;
    }

    public function transportcategory() {
        return $this->hasOne('App\TransportCategory', 'id', 'id_trans_category');
    }
}
