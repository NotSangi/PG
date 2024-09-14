<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // La creación de datos de roles debe ejecutarse primero
    $this->call(RoleTableSeeder::class); // Los usuarios necesitarán los roles previamente generados
    $this->call(UserTableSeeder::class);
    $this->call(Especialidades::class);
 
    }
}
