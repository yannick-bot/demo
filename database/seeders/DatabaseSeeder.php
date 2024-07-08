<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Filiere::create([
            "nom" => "Achitecture logiciel",
            "code" => "AL",
        ]);

        Filiere::create([
            "nom" => "Marketing et action commerciale",
            "code" => "MAC",
        ]);

        Filiere::create([
            "nom" => "Securite informatique",
            "code" => "SI",
        ]);
    }
}
