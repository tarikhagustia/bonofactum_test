<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::unguard();
        Type::insert([
            [
                'name' => 'Ring'
            ],
            [
                'name' => 'Bracelets'
            ],
            [
                'name' => 'Necklaces'
            ]
            
        ]);
    }
}
