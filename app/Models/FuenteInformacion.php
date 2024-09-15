<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FuenteInformacion
 * 
 * @property int $id
 * @property int $arc_id
 * @property int $res_id
 * @property int $ele_id
 * @property string|null $documento
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Resultado $resultado
 * @property Archivo $archivo
 * @property ElementoFundamental $elemento_fundamental
 * @property Collection|ElementoFundamental[] $elemento_fundamentals
 * @property Collection|Resultado[] $resultados
 *
 * @package App\Models
 */
class FuenteInformacion extends Model
{
	protected $table = 'fuente_informacions';

	protected $casts = [
		'arc_id' => 'int',
		'res_id' => 'int',
		'ele_id' => 'int'
	];

	protected $fillable = [
		'arc_id',
		'res_id',
		'ele_id',
		'documento'
	];

	public function resultado()
	{
		return $this->belongsTo(Resultado::class, 'res_id');
	}

	public function archivo()
	{
		return $this->belongsTo(Archivo::class, 'arc_id');
	}

	public function elemento_fundamental()
	{
		return $this->belongsTo(ElementoFundamental::class, 'ele_id');
	}

	public function elemento_fundamentals()
	{
		return $this->hasMany(ElementoFundamental::class, 'fue_id');
	}

	public function resultados()
	{
		return $this->hasMany(Resultado::class, 'fue_id');
	}
}
