<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    \App\Models\User::factory()->create([
        'name' => 'Sallie Marsha',
        'email' => 'salliemarsha49@gmail.com', 
        'password' => bcrypt('#slayolay!'), 
        'role' => 'admin', 
    ]);

    
    \App\Models\User::factory(10)->create([
        'role' => 'pelanggan',
    ]);
}
}
