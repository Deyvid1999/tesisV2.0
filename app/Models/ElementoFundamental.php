<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ElementoFundamental
 * 
 * @property int $id
 * @property int $ind_id
 * @property int $fue_id
 * @property string|null $elemento
 * @property float|null $porcentaje
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Indicador $indicador
 * @property FuenteInformacion $fuente_informacion
 * @property Collection|FuenteInformacion[] $fuente_informacions
 *
 * @package App\Models
 */
class ElementoFundamental extends Model
{
	protected $table = 'elemento_fundamentals';

	protected $casts = [
		'ind_id' => 'int',
		'fue_id' => 'int',
		'porcentaje' => 'float'
	];

	protected $fillable = [
		'ind_id',
		'fue_id',
		'elemento',
		'porcentaje'
	];

	public function indicador()
	{
		return $this->belongsTo(Indicador::class, 'ind_id');
	}

	public function fuente_informacion()
	{
		return $this->belongsTo(FuenteInformacion::class, 'fue_id');
	}

	public function fuente_informacions()
	{
		return $this->hasMany(FuenteInformacion::class, 'ele_id');
	}
}
