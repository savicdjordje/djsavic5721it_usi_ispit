<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registarski_broj' => fake()->text(255),
            'marka' => fake()->text(255),
            'model' => fake()->text(255),
            'godina_proizvodnje' => fake()->randomNumber(0),
            'klijent_id' => \App\Models\User::factory(),
        ];
    }
}
