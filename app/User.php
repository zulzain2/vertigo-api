<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $table = 'users';
    public $incrementing = FALSE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'id_role');
    }

    public function getImgPathAttribute($value)
    {
        $url = URL::to($value);
        return $url;
    }

    public function inquiry()
    {
        return $this->hasOne('App\InquiryType', 'id', 'id_inquiry');
    }

    public function document_log()
    {
        return $this->hasMany('App\DocumentLog', 'id_user', 'id');
    }

    public function ebs()
    {
        return $this->belongsToMany('App\EBS', 'ebs_staff_uses', 'id_user', 'id_ebs');
    }

    public function ebs_booking()
    {
        return $this->hasMany('App\EBSStaffUse', 'id_user');
    }
}
