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
       $this->call([
            ClienteSeeder::class, // Precisa vir primeiro
            AnimalSeeder::class,
            ServicoSeeder::class, // Precisa vir por último
        ]);
    }
}
