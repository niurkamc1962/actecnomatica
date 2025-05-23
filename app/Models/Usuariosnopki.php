<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;


class Usuariosnopki extends Model
{

    use HasFactory;

    use Notifiable;

    protected $fillable = [
        'correo',
        'empresa',
        'reeup',
        'role_id',
    ];

    public function roles() {
        return $this->belongsTo(Role::class);
    }
}
