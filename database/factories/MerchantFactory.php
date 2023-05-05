<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayAddress = ['غزة','رفح','خان يونس','شمال غزة'];
        $arrayGender = ['ذكر','انثى'];
        return [
            'firstName'=> fake()->firstName,
//            'middleName'=> fake()->name,
            'lastName'=> fake()->lastName,
//            'gender'=> $arrayGender[rand(0,1)],
            'email'=> fake()->email,
            'address'=> $arrayAddress[rand(0,3)],
            'phoneNumber'=> fake()->numberBetween(10,20),
        ];
    }
}
