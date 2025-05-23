<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_extrapki extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'user_id'
    ];

    public function roles() {
        return $this->belongsTo(Role::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
