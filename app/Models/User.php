<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'nombre_completo',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getNameAttribute(): string
{
    return $this->nombre_completo ?? 'Administrador';
}

    public function getFilamentName(): string
    {
        return $this->nombre_completo;
    }

    public function roles()
{
    return $this->belongsToMany(
        Rol::class,
        'usuario_roles',
        'usuario_id',
        'rol_id'
    );
}

    }

