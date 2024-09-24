<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Resultado
 * 
 * @property int $id
 * @property int $eva_uni_id
 * @property int $eva_use_id
 * @property int $eva_id
 * @property int|null $ele_id
 * @property int|null $ele_ind_id
 * @property int|null $for_id
 * @property int|null $for_ind_id
 * @property int|null $esc_id
 * @property float|null $resultado
 * @property string|null $observacion
 * @property int|null $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ElementoFundamental|null $elemento_fundamental
 * @property Formula|null $formula
 * @property Escala|null $escala
 * @property Evaluacion $evaluacion
 *
 * @package App\Models
 */
class Resultado extends Model
{
	protected $table = 'resultados';

	protected $casts = [
		'eva_uni_id' => 'int',
		'eva_use_id' => 'int',
		'eva_id' => 'int',
		'ele_id' => 'int',
		'ele_ind_id' => 'int',
		'for_id' => 'int',
		'for_ind_id' => 'int',
		'esc_id' => 'int',
		'resultado' => 'float',
		'estatus' => 'int'
	];

	protected $fillable = [
		'ele_id',
		'ele_ind_id',
		'for_id',
		'for_ind_id',
		'esc_id',
		'resultado',
		'observacion',
		'estatus'
	];

	public function elemento_fundamental()
	{
		return $this->belongsTo(ElementoFundamental::class, 'ele_id');
	}

	public function formula()
	{
		return $this->belongsTo(Formula::class, 'for_id');
	}

	public function escala()
	{
		return $this->belongsTo(Escala::class, 'esc_id');
	}

	public function evaluacion()
	{
		return $this->belongsTo(Evaluacion::class, 'eva_id');
	}
}
