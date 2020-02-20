<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SASComment extends Model
{
    use Notifiable;
    protected $table = 'sas_comments';
    public $incrementing = FALSE;
}
