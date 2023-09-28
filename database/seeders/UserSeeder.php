<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'camzu',
            'email' => 'kamil.langer@chatapp.com',
            'email_verified_at' => now(),
            'password' => Hash::make('paSs420!'),
            'profile_img' => null
        ]);

        User::factory(10)->create();
    }
}
