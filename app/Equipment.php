<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipment extends Model
{
    use Notifiable;
    protected $table = 'equipments';
    public $incrementing = FALSE;

    public function getImgPathAttribute($value)
    {
        $url = URL::to($value);
        return $url;
    }

    public function equipmentcategory()
    {
        return $this->hasOne('App\EquipmentCategory', 'id', 'id_equip_category');
    }

    public function bookings()
    {
        return $this->hasMany('App\EBSEquipmentUse', 'id_equipment');
    }

    public function ebs($date1, $date2)
    {
        return $this->belongsToMany('App\EBS', 'ebs_equipment_uses', 'id_equipment', 'id_ebs')
            ->wherePivot('created_at', '>=', $date1)
            ->wherePivot('created_at', '<', $date2)
            ->get();
    }
}
