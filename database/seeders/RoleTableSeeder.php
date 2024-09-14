<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save(); 

        $role = new Role();
        $role->name = 'paciente';
        $role->description = 'Paciente';
        $role->save();

        $role = new Role();
        $role->name = 'doctor';
        $role->description = 'Doctor';
        $role->save();
    }
}
