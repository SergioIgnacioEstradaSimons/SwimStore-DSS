<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = [
        'role_id',
        'nombre',
        'apellido',
        'correo',
        'password',
        'fecha',
        'estado',
    ];
    public function customers() : HasMany
    {
        return $this->hasMany(Customers::class);
    }
    public function administrators() : HasMany
    {
        return $this->hasMany(Administrators::class);
    }
}
