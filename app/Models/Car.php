<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;


//    public function exhibition() {
//        return $this->belongsTo(Exhibition::class);
//    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function merchants(){
        return $this->belongsTo(Merchant::class);
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fullName',
        'year',
        'carModel',
        'manufacturerType',
        'isCarNew',
        'price',
        'description',
        'mileage',
        'location',
        'countryOfOrigin',
        'numberOfDoers',
        'engineCapacity',
        'typeOfFuel',
        'typeOfGears',
        'color',
        'customer_id',
        'merchant_id',
    ];

    protected $casts = [
//        'isCarNew' => 'boolean',
    ];
}
