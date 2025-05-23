<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentospki extends Model
{
    use HasFactory;

    protected $fillable = ['documentopki', 'datospki_id'];

    public function datospki () {
        return $this->belongsTo(Datospki::class);
    }



}
