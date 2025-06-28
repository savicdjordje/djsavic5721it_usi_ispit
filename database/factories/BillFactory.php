<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bill;
use App\Models\Service;

class BillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bill::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'usluga_id' => Service::factory(),
            'cena' => fake()->randomFloat(0, 0, 9999999999.),
        ];
    }
}
