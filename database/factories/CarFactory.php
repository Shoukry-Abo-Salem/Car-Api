<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $arrayTypeOfFuel = ['بنزين','ديزل','كهرباء','هجين'];
        $arrayTypeGears = ['اوتوماتيك','عادي'];
        $arrayIsCarNew = ['جديدة','مستعملة'];
        $arrayNumberOfCylinder = [2,3,4,5,6,8,10,12,'كهرباء'];
        $arrayNumberOfDoers = [2,3,4,5,6];
        $arrayCarModel = ['سيدان','بيك أب','كوبيه','هاتش باك','دفع رباعي','واجن','تجارية','فان'];
        return [
            //
            'fullName' => fake()->name,
            'year' => fake()->numberBetween(10,50),
            'manufacturerType' => fake() ->name,
            'carModel'=> $arrayCarModel[rand(0,7)],
            'typeOfFuel' => $arrayTypeOfFuel[rand(0,3)],
            'color' => fake() ->colorName,
//            'numberOfCylinders' => $arrayNumberOfCylinder[rand(0,8)],
//            'numberOfDoers'=>$arrayNumberOfDoers[rand(0,4)],
            'isCarNew' => $arrayIsCarNew[rand(0,1)],
            'typeOfGears' => $arrayTypeGears[rand(0,1)],
            'engineCapacity' => fake() -> numberBetween(0.8,8),
            'merchant_id'=>fake()->numberBetween(1,15),
        ];
    }
}
