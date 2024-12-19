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
        $tratamiento->save();

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'endodoncia';
        $tratamiento->description = 'Endodoncia';
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'periodoncia';
        $tratamiento->description = 'Periodoncia';
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'cirugia_oral';
        $tratamiento->description = 'Cirugía Oral';
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'coronas_protesis';
        $tratamiento->description = 'Coronas y Prótesis';
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'calzas_blancas';
        $tratamiento->description = 'Clazas Blancas (Resinas)';
        $tratamiento->save(); 

        $tratamiento = new Tratamientos();
        $tratamiento->name = 'ortodoncia';
        $tratamiento->description = 'Ortodoncia';
        $tratamiento->save(); 
   
        $tratamiento = new Tratamientos();
        $tratamiento->name = 'higiene';
        $tratamiento->description = 'Higiene Oral';
        $tratamiento->save();
    }
}
