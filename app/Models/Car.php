<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function merchant() {
        return $this->belongsTo(Merchant::class,'merchant_id','id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fullName',
        'year',
        'manufacturerType',
        'isCarNew',
        'price',
        'description',
        'mileage',
        'numberOfDoers',
        'engineCapacity',
        'typeOfFuel',
        'typeOfGears',
        'color',
    ];

    protected $casts = [
//        'isCarNew' => 'boolean',
    ];
}
