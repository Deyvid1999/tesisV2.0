<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Indicador
 * 
 * @property int $id
 * @property int $sub_id
 * @property int $subcriterio_id
 * @property string|null $indicador
 * @property string|null $estandar
 * @property string|null $periodo
 * @property float|null $porcentaje
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Subcriterio $subcriterio
 * @property Collection|ElementoFundamental[] $elemento_fundamentals
 * @property Collection|Formula[] $formulas
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Indicador extends Model
{
	protected $table = 'indicadors';

	protected $casts = [
		'sub_id' => 'int',
		'subcriterio_id' => 'int',
		'porcentaje' => 'float'
	];

	protected $fillable = [
		'sub_id',
		'subcriterio_id',
		'indicador',
		'estandar',
		'periodo',
		'porcentaje'
	];

	public function subcriterio()
	{
		return $this->belongsTo(Subcriterio::class, 'sub_id');
	}

	public function elemento_fundamentals()
	{
		return $this->hasMany(ElementoFundamental::class, 'ind_id');
	}

	public function formulas()
	{
		return $this->hasMany(Formula::class, 'ind_id');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_has_indicadors', 'ind_id', 'id');
	}
}
