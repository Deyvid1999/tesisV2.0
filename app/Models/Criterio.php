<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcriterios()
    {
        return $this->hasMany(Subcriterio::class);
    }

    public function indicadores()
    {
        return $this->hasMany(Indicador::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'user_has_criterios');
    }
}
