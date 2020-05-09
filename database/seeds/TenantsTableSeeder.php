<?php

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '23234432000202',
            'name' => 'WkrFood',
            'url' => 'wkrfood',
            'email' => 'wilker-22@outlook.com',
        ]);
    }
}
