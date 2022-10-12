<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome_completo' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => $this->faker->numerify('(##) 9####-####'),
            'cep' => $this->faker->numerify('#####-###'),
            'endereco' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->secondaryAddress(),
            'bairro' => $this->faker->city(),
            'cidade' => $this->faker->city(),
            'estado' => collect(['MG', 'DF', 'SP', 'RJ'])->random(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
