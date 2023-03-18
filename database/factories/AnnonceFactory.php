<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'nature' => "full time",
            'salary' => fake()->randomNumber(5,true),
            'description' => fake()->text(),
            'company_id' => 1,
            'user_id' => 3,
            'categorie_id' => 1,
            'responsibility' => fake()->text(),
            'qualification' => fake()->text(),
            'duration' => fake()->randomDigitNotNull(),
            'niveau_etude'=>fake()->randomDigitNotNull(),
        ];
    }
}
