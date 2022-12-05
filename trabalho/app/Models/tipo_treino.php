<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_treino extends Model
{
    use HasFactory;
    public function treino() {
        return $this->belongsTo('App\Models\treino');
    }
    protected $table = 'tipo_treino';

}
