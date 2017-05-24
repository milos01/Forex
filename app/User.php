<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'country', 'password', 'avatar','activated', 'trial_ends_at', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['trial_ends_at'];

    public function hasRole($role){
        if($this->role->name == $role){
            return true;
        }
        return false;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
