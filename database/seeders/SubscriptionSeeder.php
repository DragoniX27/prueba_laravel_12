<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription;
use App\Models\Plan;
use App\Models\Companie;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscription::create([
            'plan_id' => Plan::select('id')->first()->id,
            'company_id' => Companie::select('id')->first()->id,
            'is_active' => true,
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ]);
    }
}
