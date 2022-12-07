<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'code'             => fake()->unique()->randomElement(['EN', 'KA', 'AF', 'AL', 'AQ', 'AR']),
			'name'             => json_encode(['en'=>'Georgia', 'კა'=>'საქართველო']),
		];
	}
}
