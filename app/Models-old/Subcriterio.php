<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcriterio extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function indicadores()
    {
        return $this->hasMany(Indicador::class);
    }

    public function criterio()
    {
        return $this->belongsTo(Criterio::class, 'criterio_id');
    }
}
