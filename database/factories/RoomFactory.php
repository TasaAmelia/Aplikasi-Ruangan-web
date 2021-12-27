<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'roomtype_id' => mt_rand(1,5),
            'building_id' => mt_rand(1,5),
            'roomname' => $this->faker->word(),
            'roomdescription' => $this->faker->word(),
        ];
    }
}
