<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Evaluacion
 * 
 * @property int $id
 * @property Carbon|null $fecha_creacion
 * @property Carbon|null $fecha_inicial
 * @property Carbon|null $fecha_final
 * @property int $res_id
 * @property int $uni_id
 * @property int $user_id
 * @property int|null $informe
 * @property int|null $evaluador
 * @property int|null $facultad
 * @property int|null $departamento
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Resultado $resultado
 * @property Universidad $universidad
 * @property Collection|Resultado[] $resultados
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Evaluacion extends Model
{
	protected $table = 'evaluacions';

	protected $casts = [
		'fecha_creacion' => 'datetime',
		'fecha_inicial' => 'datetime',
		'fecha_final' => 'datetime',
		'res_id' => 'int',
		'uni_id' => 'int',
		'user_id' => 'int',
		'informe' => 'int',
		'evaluador' => 'int',
		'facultad' => 'int',
		'departamento' => 'int'
	];

	protected $fillable = [
		'fecha_creacion',
		'fecha_inicial',
		'fecha_final',
		'res_id',
		'uni_id',
		'user_id',
		'informe',
		'evaluador',
		'facultad',
		'departamento'
	];

	public function resultado()
	{
		return $this->belongsTo(Resultado::class, 'res_id');
	}

	public function universidad()
	{
		return $this->belongsTo(Universidad::class, 'uni_id');
	}

	public function resultados()
	{
		return $this->hasMany(Resultado::class, 'eva_id');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'eva_id');
	}
}
