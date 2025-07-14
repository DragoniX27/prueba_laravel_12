<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'company_id' => \App\Models\Companie::factory()->create()->id,
            'password' => static::$password ??= Hash::make('password'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $role = Role::firstOrCreate([
                'name' => 'test',
                'guard_name' => 'sanctum',
            ]);

            $user->assignRole($role);
        });
    }
}
