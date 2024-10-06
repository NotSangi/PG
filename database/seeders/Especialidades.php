<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Especialidades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $espe = new Especialidad();
        $espe->name = 'diseno_sonrisa';
        $espe->description = 'Diseño Sonrisa';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'endodoncia';
        $espe->description = 'Endodoncia';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'periodoncia';
        $espe->description = 'Periodoncia';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'cirugia_oral';
        $espe->description = 'Cirugía Oral';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'coronas_protesis';
        $espe->description = 'Coronas y Prótesis';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'calzas_blancas';
        $espe->description = 'Clazas Blancas (Resinas)';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'ortodoncia';
        $espe->description = 'Ortodoncia';
        $espe->save(); 
   
        $espe = new Especialidad();
        $espe->name = 'higiene';
        $espe->description = 'Higiene Oral';
        $espe->save(); 
    }
}
