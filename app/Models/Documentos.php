<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    public function users()
    {   
        return $this->belongsTo('App\Models\User', 'documento_user')->withTimestamps();
    }
}
