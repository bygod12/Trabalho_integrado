<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treino extends Model
{
    use HasFactory;
    public function ficha() {
        return $this->belongsTo('App\Models\ficha');
    }
    protected $table = "treino";

}
