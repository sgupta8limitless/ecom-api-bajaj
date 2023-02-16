<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden=['password'];


    public function products()
    {
        return $this->belongsToMany(Product::class,'user_products');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
