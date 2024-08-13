<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function elementosFundamentales()
    {
        return $this->hasMany(ElementoFundamental::class);
    }

    public function fuentesInformaciones()
    {
        return $this->hasMany(FuenteInformacion::class);
    }

    public function resCondicionInstitucions()
    {
        return $this->hasMany(ResCondicionInstitucion::class);
    }

    public function resDocentes()
    {
        return $this->hasMany(ResDocente::class);
    }

    public function resAcademicos()
    {
        return $this->hasMany(ResAcademico::class);
    }

    public function resInvestigacions()
    {
        return $this->hasMany(ResInvestigacion::class);
    }

    public function resVinculacions()
    {
        return $this->hasMany(ResVinculacion::class);
    }

    public function resGestionCalidads()
    {
        return $this->hasMany(ResGestionCalidad::class);
    }

    public function subcriterio()
    {
        return $this->belongsTo(Subcriterio::class, 'subcriterio_id');
    }

    public function criterio()
    {
        return $this->belongsTo(Criterio::class, 'criterio_id');
    }


    public function res_indicador29()
    {
        return $this->hasOne(ResIndicador29::class);
    }

    public function res_indicador_16()
    {
        return $this->hasMany(ResIndicador16::class);
    }

    public function res_indicador_17()
    {
        return $this->hasMany(ResIndicador17::class);
    }

    public function res_indicador_19()
    {
        return $this->hasMany(ResIndicador19::class);
    }

    public function res_indicador_21()
    {
        return $this->hasMany(ResIndicador21::class);
    }

    public function res_indicador_22()
    {
        return $this->hasMany(ResIndicador22::class);
    }

    public function res_indicador_25()
    {
        return $this->hasMany(ResIndicador25::class);
    }

    public function res_indicador_26()
    {
        return $this->hasMany(ResIndicador26::class);
    }

    public function res_indicador_29()
    {
        return $this->hasMany(ResIndicador29::class);
    }
}
