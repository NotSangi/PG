<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'document',
        'adress',
        'email',
        'tel',
        'password',
        'tratamiento_datos',
        'estado'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {   
        return $this->belongsToMany('App\Models\Role', 'role_user')->withTimestamps();
    }

    public function citas()
    {   
        return $this->belongsToMany('App\Models\Formluario')->withTimestamps();
    }

    public function eventos()
    {   
        return $this->belongsToMany('App\Models\Evento')->withTimestamps();
    }
    
    public function especialidades()
    {   
        return $this->belongsToMany('App\Models\Especialidad', 'especialidad_users')->withTimestamps();
    }

    public function documentos()
    {   
        return $this->belongsToMany('App\Models\Documentos', 'documentos_users')->withTimestamps();
    }

    //ROLES
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    //ESPECIALIDADES
    public function getEspeciality(){
        return $this->especialidades()->first();
    } 

    public function hasAnyEspecialty($ids)
    {
        if (is_array($ids)) {
            foreach ($ids as $id) {
            if ($this->hasEspeciality($id)) {
                return true;
            }
            }
        } else {
            if ($this->hasEspeciality($ids)) {
                return true;
            }
        }
        return false;
    }

    public function hasEspeciality($id)
    {
        if ($this->especialidades()->where('user_id', $id)->first()) {
            return true;
        }
        return false;
    }

    //DOCUMENTOS

    public function getDocument(){
        return $this->documentos()->first();
    } 

    public function hasAnyDocument($ids)
    {
        if (is_array($ids)) {
            foreach ($ids as $id) {
            if ($this->hasDocument($id)) {
                return true;
            }
            }
        } else {
            if ($this->hasDocument($ids)) {
                return true;
            }
        }
        return false;
    }

    public function hasDocument($id)
    {
        if ($this->documentos()->where('user_id', $id)->first()) {
            return true;
        }
        return false;
    }
}
