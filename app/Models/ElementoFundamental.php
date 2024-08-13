<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoFundamental extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function indicador()
    {
        return $this->belongsTo(Indicador::class, 'indicador_id');
    }

    public function res_condicion_institucion()
    {
        return $this->hasMany(ResCondicionInstitucion::class);
    }

    public function res_docente()
    {
        return $this->hasMany(ResDocente::class);
    }

    public function res_academicos()
    {
        return $this->hasMany(ResAcademico::class);
    }

    public function res_investigacions()
    {
        return $this->hasMany(ResInvestigacion::class);
    }

    public function res_vinculacion()
    {
        return $this->hasMany(ResVinculacion::class);
    }

    public function res_gestion_calidad()
    {
        return $this->hasMany(ResGestionCalidad::class);
    }    
}
