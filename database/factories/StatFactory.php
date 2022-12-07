<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StatFactory extends Factory
{
	public function definition()
	{
		return [
			'locale'     => json_encode(['en'=>Str::random(10), 'ka'=>Str::random(10)]),
			'country'    => Str::random(10),
			'country_id' => fake()->unique()->numberBetween(1, 100),
			'confirmed'  => fake()->randomNumber(),
			'recovered'  => fake()->randomNumber(),
			'critical'   => fake()->randomNumber(),
			'deaths'     => fake()->randomNumber(),
		];
	}
}
