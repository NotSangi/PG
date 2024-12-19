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
    $this->call(Document::class);
    $this->call(Tratamiento::class);
    $this->call(Especialidades::class);
    $this->call(RoleTableSeeder::class); 
    $this->call(UserTableSeeder::class);
    
    
 
    }
}
