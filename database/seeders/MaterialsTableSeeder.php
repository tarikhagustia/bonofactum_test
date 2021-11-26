<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::unguard();
        Material::insert([
            [
                'name' => 'Silver'
            ],
            [
                'name' => 'Gold'
            ],
            [
                'name' => 'Silver & Gold'
            ]
        ]);
    }
}
