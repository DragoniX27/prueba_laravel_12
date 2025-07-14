<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Companie;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Santiago',
            'email' => 'santiagogil271@gmail.com',
            'company_id' => Companie::select('id')->first()->id,
            'password' => bcrypt('12345'), 
        ])->assignRole(Role::where('name', 'admin')->where('guard_name', 'sanctum')->first());
    }
}
