<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->text(255),
            'opis' => fake()->text(),
            'vozilo_id' => \App\Models\Vehicle::factory(),
            'zaposleni_id' => \App\Models\User::factory(),
            'admin_id' => \App\Models\User::factory(),
            'status_id' => \App\Models\Status::factory(),
        ];
    }
}
