<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EBS extends Model
{
    use Notifiable;
    protected $table = 'ebs';
    public $incrementing = FALSE;
    protected $with = ['ebsstaffuse.user', 'ebsequipmentuse.equipment'];

    public function getImgPathUpdateAttribute($value)
    {
        $url = URL::to($value);
        return $url;
    }

    public function ebsstaffuse()
    {
        return $this->hasMany('App\EBSStaffUse', 'id_ebs', 'id');
    }

    public function ebsequipmentuse()
    {
        return $this->hasMany('App\EBSEquipmentUse', 'id_ebs', 'id');
    }

    public function staffs()
    {
        return $this->belongsToMany('App\User', 'ebs_staff_uses', 'id_ebs', 'id_user');
    }

    public function equipments()
    {
        return $this->belongsToMany('App\Equipment', 'ebs_equipment_uses', 'id_ebs', 'id_equipment');
    }

    public function getStartTimeAttribute()
    {
        return date('h:i A', strtotime($this->start_date));
    }

    public function getStartTime24Attribute()
    {
        return date('H:i', strtotime($this->start_date));
    }

    public function getEndTimeAttribute()
    {
        return date('h:i A', strtotime($this->end_date));
    }

    public function getEndTime24Attribute()
    {
        return date('H:i', strtotime($this->end_date));
    }

}
