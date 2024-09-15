<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Criterio
 * 
 * @property int $id
 * @property string|null $criterio
 * @property float|null $porcentaje
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Subcriterio[] $subcriterios
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Criterio extends Model
{
	protected $table = 'criterios';

	protected $casts = [
		'porcentaje' => 'float'
	];

	protected $fillable = [
		'criterio',
		'porcentaje'
	];

	public function subcriterios()
	{
		return $this->hasMany(Subcriterio::class, 'cri_id');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_has_criterios', 'cri_id', 'id');
	}
}
