<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamientos_cita extends Model
{
    use HasFactory;

    protected $table = "tratamiento_cita";
    protected $fillable = [
        'cita_id',
        'tratamiento_id',
    ];
}
