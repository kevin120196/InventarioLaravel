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
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Gerente(){
        return $this->user_type === 'Gerente';
    }

    public function Vendedor(){
        return $this->user_type === 'Venta';
    }

    public function scopeName($query,$name){
        return $query->where('name','LIKE',"%$name%");
    }

}
