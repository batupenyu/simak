<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();

        return [
            'class_id' => Arr::random([1, 2, 3, 4]),
            'name' => $faker->name(),
            'gender' => Arr::random(['L', 'P']),
            'nis' => mt_rand(0000001, 999999),
        ];
    }
}
