<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad_user extends Model
{
    use HasFactory;
    protected $table = "especialidad_users";
    protected $fillable = [
        'user_id',
        'especialidad_id',
    ];

}
