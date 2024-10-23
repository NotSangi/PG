<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo_documento',
        'document',
        'name',
        'last_name',
        'tel',
        'email',
        'tratamiento',
        'doctor_id',
        'llamada',
        'estado',
        'fecha',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

