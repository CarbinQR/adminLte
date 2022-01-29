<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Company::factory(11000)->create()->each(function ($company) {
            $company->customers()->attach(
                Customer::factory(10)->create()->pluck('id')->toArray()
            );
        });
    }
}
