<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::unguard();
        Country::insert([
            [
                'name' => 'Indonesia'
            ],
            [
                'name' => 'Malaysia'
            ]
        ]);
    }
}
