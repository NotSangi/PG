<?php

namespace Database\Seeders;

use App\Models\Tratamientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tratamiento extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tratamiento = new Tratamientos();
        $tratamiento->name = 'diseno_sonrisa';
        $tratamiento->description = 'Diseño de Sonrisa';
        $tratamiento->estado = 1;
        $tratamiento->save();

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'endodoncia';
        $tratamiento->description = 'Endodoncia';
        $tratamiento->estado = 1;
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'periodoncia';
        $tratamiento->description = 'Periodoncia';
        $tratamiento->estado = 1;
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'cirugia_oral';
        $tratamiento->description = 'Cirugía Oral';
        $tratamiento->estado = 1;
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'coronas_protesis';
        $tratamiento->description = 'Coronas y Prótesis';
        $tratamiento->estado = 1;
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'calzas_blancas';
        $tratamiento->description = 'Calzas Blancas (Resinas)';
        $tratamiento->estado = 1;
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'ortodoncia';
        $tratamiento->description = 'Ortodoncia';
        $tratamiento->estado = 1;
        $tratamiento->save(); 
   
        $tratamiento = new Tratamientos();
        $tratamiento->name = 'higiene';
        $tratamiento->description = 'Higiene Oral';
        $tratamiento->estado = 1;
        $tratamiento->save();
    }
}
