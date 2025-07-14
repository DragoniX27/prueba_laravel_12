<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Basic Plan',
            'monthly_price' => 10.00,
            'limit_users' => 5,
            'features' => 'soy un plan basico con 5 usuarios y 10.00 de precio mensual',
        ]);
    }
}
