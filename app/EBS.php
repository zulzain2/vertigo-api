<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EBS extends Model
{
    use Notifiable;
    protected $table = 'ebs';
    public $incrementing = FALSE;
}
