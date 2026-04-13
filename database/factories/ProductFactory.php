<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // random entre 0 y 24 meses atrás
        $monthsAgo = fake()->numberBetween(0, 24);

        $date = Carbon::now()->subMonths($monthsAgo);

        return [
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'brand' => fake()->randomElement(['Hyundai', 'LG', 'Samsung']),
            'category' => fake()->randomElement([
                'Washing Machines',
                'Refrigerators',
                'Microwaves'
            ]),
            'price' => fake()->numberBetween(300000, 3000000),
            'stock' => fake()->numberBetween(0, 50),

            'model' => strtoupper(fake()->bothify('???####')),
            'batch' => $date->format('ym'),

            'manufactured_at' => $date,

            'status' => fake()->randomElement([
                'available',
                'reserved',
                'disposed'
            ]),

            'notes' => fake()->optional()->sentence(),
        ];
    }
}