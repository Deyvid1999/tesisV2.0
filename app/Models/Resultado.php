<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Resultado
 * 
 * @property int $id
 * @property int $for_id
 * @property int $eva_id
 * @property int $fue_id
 * @property int $evaluacion_id
 * @property int $elemento_fundamental_id
 * @property float|null $porcentaje
 * @property string|null $valoracion
 * @property string|null $observacion
 * @property int|null $estatus
 * @property int|null $formula
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property FuenteInformacion $fuente_informacion
 * @property Evaluacion $evaluacion
 * @property Collection|Evaluacion[] $evaluacions
 * @property Collection|Formula[] $formulas
 * @property Collection|FuenteInformacion[] $fuente_informacions
 *
 * @package App\Models
 */
class Resultado extends Model
{
	protected $table = 'resultados';

	protected $casts = [
		'for_id' => 'int',
		'eva_id' => 'int',
		'fue_id' => 'int',
		'evaluacion_id' => 'int',
		'elemento_fundamental_id' => 'int',
		'porcentaje' => 'float',
		'estatus' => 'int',
		'formula' => 'int'
	];

	protected $fillable = [
		'for_id',
		'eva_id',
		'fue_id',
		'evaluacion_id',
		'elemento_fundamental_id',
		'porcentaje',
		'valoracion',
		'observacion',
		'estatus',
		'formula'
	];

	public function fuente_informacion()
	{
		return $this->belongsTo(FuenteInformacion::class, 'fue_id');
	}

	public function evaluacion()
	{
		return $this->belongsTo(Evaluacion::class, 'eva_id');
	}

	public function formula()
	{
		return $this->belongsTo(Formula::class, 'for_id');
	}

	public function evaluacions()
	{
		return $this->hasMany(Evaluacion::class, 'res_id');
	}

	public function formulas()
	{
		return $this->hasMany(Formula::class, 'res_id');
	}

	public function fuente_informacions()
	{
		return $this->hasMany(FuenteInformacion::class, 'res_id');
	}
}
