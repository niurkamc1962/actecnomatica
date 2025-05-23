<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresaspki extends Model
{
    use HasFactory;

    protected $fillable = ['reeup', 'entidad', 'osde'];
}
