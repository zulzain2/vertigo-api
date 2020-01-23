<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipment extends Model
{
    use Notifiable;
    protected $table = 'roles';
    public $incrementing = FALSE;
}
