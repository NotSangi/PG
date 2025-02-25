<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'estado',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_user')->withTimestamps();
    }
}
