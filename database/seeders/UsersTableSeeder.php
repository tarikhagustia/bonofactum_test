<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('Password123')
        ]);
    }
}
