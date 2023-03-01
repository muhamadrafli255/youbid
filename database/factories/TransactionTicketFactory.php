<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number'            => $this->faker->randomNumber(8),
            'total_price'       => $this->faker->numberBetween(100000, 1000000),
            'payment_status'    =>  1,
        ];
    }
}
