<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Companie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companie>
 */
class CompanieFactory extends Factory
{
    protected $model = Companie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
        ];
    }
}
