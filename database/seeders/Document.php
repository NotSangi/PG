<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Documentos;

class Document extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $document = new Documentos();
        $document->name = 'CC';
        $document->description = 'CC - Cédula de Ciudadanía';
        $document->save();

        $document = new Documentos();
        $document->name = 'CE';
        $document->description = 'CE - Cédula de Extranjería';
        $document->save();

        $document = new Documentos();
        $document->name = 'IE';
        $document->description = 'IE - ID Extranjero';
        $document->save();

        $document = new Documentos();
        $document->name = 'NIT';
        $document->description = 'NIT';
        $document->save();
        
        $document = new Documentos();
        $document->name = 'PA';
        $document->description = 'PA - Pasaporte';
        $document->save();

        $document = new Documentos();
        $document->name = 'RC';
        $document->description = 'RC - Registro Civil';
        $document->save();

        $document = new Documentos();
        $document->name = 'TI';
        $document->description = 'TI - Tarjeta de Identidad';
        $document->save();
    }
}
