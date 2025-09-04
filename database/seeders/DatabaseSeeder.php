<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name'      => 'Usuario padrão',
            'email'     => 'user@user.com',
            'password'  => 'user1234',
            'user_type' => 'user',
            'cpf'       => '000.000.000-00',
        ]);

        User::factory()->create([
            'name'      => 'Usuario lojista',
            'email'     => 'shopkeeper@shopkeeper.com',
            'password'  => 'user1234',
            'user_type' => 'shopkeeper',
            'cpf'       => '000.000.000-01',
        ]);
    }
}
