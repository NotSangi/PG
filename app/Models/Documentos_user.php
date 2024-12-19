<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos_user extends Model
{
    use HasFactory;

    protected $table = "documentos_users";
    protected $fillable = [
        'user_id',
        'documentos_id',
    ];

}
