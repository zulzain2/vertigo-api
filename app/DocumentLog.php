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
}
