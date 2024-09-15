<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * 
 * @property int $id
 * @property int $eva_id
 * @property string|null $name
 * @property string|null $email
 * @property Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Evaluacion $evaluacion
 * @property Collection|Criterio[] $criterios
 * @property Collection|Indicador[] $indicadors
 * @property Collection|Universidad[] $universidads
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    Use HasRoles;

	protected $table = 'users';

	protected $casts = [
		'eva_id' => 'int',
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'eva_id',
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function evaluacion()
	{
		return $this->belongsTo(Evaluacion::class, 'eva_id');
	}

	public function criterios()
	{
		return $this->belongsToMany(Criterio::class, 'user_has_criterios', 'id', 'cri_id');
	}

	public function indicadors()
	{
		return $this->belongsToMany(Indicador::class, 'user_has_indicadors', 'id', 'ind_id');
	}

	public function universidads()
	{
		return $this->belongsToMany(Universidad::class, 'user_has_universidads', 'id', 'uni_id');
	}
}
