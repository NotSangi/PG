<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    static $rules = [

        'title'=>'required',
        'user_id'=>'required',
        'selector' => 'required',
        'doctor_id'=>'required',
        'descripcion' =>'required',
        'start' => 'required',
        'hora_cita' => 'required',
        'color' => 'required'

    ];

    protected $fillable=['title','user_id','selector', 'doctor_id', 'descripcion', 'start', 'hora_cita', 'color'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }}
