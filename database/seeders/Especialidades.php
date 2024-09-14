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
        $espe->name = 'otorrino';
        $espe->description = 'Otorrinolaringología';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'general';
        $espe->description = 'Medicina General';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'pediatra';
        $espe->description = 'Pediatría';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'aneste';
        $espe->description = 'Anestesiología';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'cardio';
        $espe->description = 'Cardiología';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'gastro';
        $espe->description = 'Gastroenterología';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'gineco';
        $espe->description = 'Ginecología';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'psico';
        $espe->description = 'Psicología';
        $espe->save(); 
   
        $espe = new Especialidad();
        $espe->name = 'psiquia';
        $espe->description = 'Psiquiatría';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'ortope';
        $espe->description = 'Ortopedia';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'neuro';
        $espe->description = 'Neurología';
        $espe->save(); 

        $espe = new Especialidad();
        $espe->name = 'oftal';
        $espe->description = 'Oftalmología';
        $espe->save(); 
    
    }
}
