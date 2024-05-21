<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nom' => $this->faker->name(),
            'Prenom' => $this->faker->lastName(),
            'Adresse' => $this->faker->address(),
            'Ville' => $this->faker->city(),
            'CP' => $this->faker->postcode(),
            'Pays' => $this->faker->country(),
            'Telephone' => $this->faker->phoneNumber(),
            'Email' => $this->faker->email(),
        ];
    }
}
