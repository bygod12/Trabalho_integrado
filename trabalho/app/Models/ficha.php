<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{
    use HasFactory;
    protected $dates = ['ficdata_inicio','ficdata_final'];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    protected $table = 'ficha';


}
