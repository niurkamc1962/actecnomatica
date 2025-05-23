<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datospki extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'contenido', 'categoriaspki_id', 'bloquecategoria', 'documentopki'];

    public function categoriaspki() {
        return $this->belongsTo(Categoriaspki::class);
    }

    public function documentospki(){
        return $this->hasMany(Documentospki::class);
    }
}
