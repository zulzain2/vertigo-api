<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InquiryType extends Model
{
    use Notifiable;
    protected $table = 'inquiry_types';
    public $incrementing = FALSE;

    public function user() {
        return $this->hasMany('App\User', 'id_inquiry', 'id');
    }

    public function tms() {
        return $this->hasMany('App\TMS', 'id_tms', 'id');
    }
}
