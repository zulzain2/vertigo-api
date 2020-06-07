<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Scheduler extends Model
{
    use Notifiable;
    protected $table = 'schedulers';
    public $incrementing = FALSE;
}
