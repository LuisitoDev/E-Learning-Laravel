<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VUsuarioRol
 * 
 * @property int $IdUsuario
 * @property string $NombreUsuario
 * @property string $ApellidoPaternoUsuario
 * @property string $ApellidoMaternoUsuario
 * @property string $GeneroUsuario
 * @property Carbon $FechaNacimientoUsuario
 * @property string|null $ImagenPerfilUsuario
 * @property string $CorreoUsuario
 * @property string $PasswordUsuario
 * @property Carbon $FechaCreacionUsuario
 * @property bool $EstadoUsuario
 * @property int $IdRol
 * @property string $TipoRol
 *
 * @package App\Models
 */
class VUsuarioRol extends Model
{
	protected $table = 'v_usuario_rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdUsuario' => 'int',
		'FechaNacimientoUsuario' => 'date',
		'FechaCreacionUsuario' => 'date',
		'EstadoUsuario' => 'bool',
		'IdRol' => 'int'
	];

	protected $fillable = [
		'IdUsuario',
		'NombreUsuario',
		'ApellidoPaternoUsuario',
		'ApellidoMaternoUsuario',
		'GeneroUsuario',
		'FechaNacimientoUsuario',
		'ImagenPerfilUsuario',
		'CorreoUsuario',
		'PasswordUsuario',
		'FechaCreacionUsuario',
		'EstadoUsuario',
		'IdRol',
		'TipoRol'
	];
}
