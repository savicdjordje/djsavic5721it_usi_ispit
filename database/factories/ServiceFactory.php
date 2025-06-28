<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Status;
use App\Models\User;
use App\Models\Vehicle;

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
     */
    public function definition(): array
    {
        return [
            'vozilo_id' => Vehicle::factory(),
            'zaposleni_id' => User::factory(),
            'admin_id' => User::factory(),
            'status_id' => Status::factory(),
            'naziv' => fake()->word(),
            'opis' => fake()->text(),
        ];
    }
}
