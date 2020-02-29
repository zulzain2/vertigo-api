<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EBSStaffUse extends Model
{
    use Notifiable;
    protected $table = 'ebs_staff_uses';
    public $incrementing = FALSE;
}
