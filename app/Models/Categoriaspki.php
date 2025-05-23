<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriaspki extends Model
{
    use HasFactory;

    protected $fillable = ['categoria', 'descripcion'];

    public function datospki(){
        return $this->hasMany(Datospki::class);
    }
}
