<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TBS extends Model
{
    use Notifiable;
    protected $table = 'tbs';
    public $incrementing = FALSE;
}
