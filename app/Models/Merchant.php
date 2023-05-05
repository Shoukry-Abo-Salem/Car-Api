<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Merchant extends Authenticatable
{

    public function cars() {
        return $this->hasMany(Car::class,'merchant_id','id');
    }


    use HasFactory,HasApiTokens;

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at',
    ];
}
