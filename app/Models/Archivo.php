<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Archivo
 * 
 * @property int $id
 * @property int $fuente_informacion_id
 * @property string|null $archivo
 * @property string|null $observacion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|FuenteInformacion[] $fuente_informacions
 *
 * @package App\Models
 */
class Archivo extends Model
{
	protected $table = 'archivos';

	protected $casts = [
		'fuente_informacion_id' => 'int'
	];

	protected $fillable = [
		'fuente_informacion_id',
		'archivo',
		'observacion'
	];

	public function fuente_informacions()
	{
		return $this->hasMany(FuenteInformacion::class, 'arc_id');
	}
}
