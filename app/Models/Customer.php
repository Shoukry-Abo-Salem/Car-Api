<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class Customer extends Authenticatable
{
    use HasFactory,HasApiTokens;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
    ];



}
