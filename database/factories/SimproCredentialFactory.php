<?php

namespace StitchDigital\LaravelSimproApi\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use StitchDigital\LaravelSimproApi\Models\SimproCredential;

class SimproCredentialFactory extends Factory
{
    protected $model = SimproCredential::class;

    public function definition(): array
    {
        return [
            'authenticatable_id' => $this->faker->randomNumber(),
            'authenticatable_type' => 'App\\Models\\User',
            'simpro_authenticator' => $this->faker->text(50),
        ];
    }
}
