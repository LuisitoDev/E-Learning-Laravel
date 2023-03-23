<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UsurolFields;

/**
 * Class Usurol
 * 
 * @property int $IdUsuario
 * @property int $IdRol
 * 
 * @property Rol $role
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Usurol extends Model implements UsurolFields
{
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::IdUsuario_col => 'int',
		self::IdRol_col => 'int'
	];

	public function role()
	{
		return $this->belongsTo(Rol::class, self::IdRol_col);
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, self::IdUsuario_col);
	}
}
