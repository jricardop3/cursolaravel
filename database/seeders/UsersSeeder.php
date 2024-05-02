<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => 'JoseRicardo',
            'lastName' => 'Peixoto',
            'email' => 'sac@spgweb.com.br',
            'password' => bcrypt('12345678'),
        ]);
    }
}
