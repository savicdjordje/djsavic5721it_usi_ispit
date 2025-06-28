<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cena' => fake()->randomNumber(2),
            'usluga_id' => \App\Models\Service::factory(),
        ];
    }
}
