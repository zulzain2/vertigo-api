<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DocumentLog extends Model
{
    use Notifiable;
    protected $table = 'document_logs';
    public $incrementing = FALSE;

    public function user() {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
