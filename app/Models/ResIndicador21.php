<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResIndicador21 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function universidad()
    {
        return $this->belongsTo(Universidad::class, 'universidad_id');
    }

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }

    public function indicador()
    {
        return $this->belongsTo(Indicador::class, 'indicador_id');
    }

    public function ElementoFundamental()
    {
        return $this->belongsTo(ElementoFundamental::class, 'elemento_fundamental_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}