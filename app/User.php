<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id');
    }

    use Notifiable;

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

    public function ecole(){
        return $this->belongsTo('App\Models\Ecole','ecole_id');
    }

    public function eleves(){
        return $this->hasMany('App\Models\Eleve','tel_tuteur');
    }

    public function prof(){
        return $this->hasOne('App\Models\Prof', 'user_id');
    }

    public function ecoles(){
        return $this->hasMany('App\Models\Ecole','revendeur_id');
    }
}
