<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VMensajeUsuarioenviaUsuariorecibe
 * 
 * @property int $IdMensaje
 * @property int $UsuarioEnvia
 * @property int $UsuarioRecibe
 * @property string $DescripcionMensaje
 * @property Carbon $FechaCreacionMensaje
 * @property bool $EstadoMensaje
 * @property string|null $NombreUsuarioEnvia
 * @property string|null $ImagenUsuarioEnvia
 * @property string|null $NombreUsuarioRecibe
 * @property string|null $ImagenUsuarioRecibe
 *
 * @package App\Models
 */
class VMensajeUsuarioenviaUsuariorecibe extends Model
{
	protected $table = 'v_mensaje_usuarioenvia_usuariorecibe';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdMensaje' => 'int',
		'UsuarioEnvia' => 'int',
		'UsuarioRecibe' => 'int',
		'FechaCreacionMensaje' => 'date',
		'EstadoMensaje' => 'bool'
	];

	protected $fillable = [
		'IdMensaje',
		'UsuarioEnvia',
		'UsuarioRecibe',
		'DescripcionMensaje',
		'FechaCreacionMensaje',
		'EstadoMensaje',
		'NombreUsuarioEnvia',
		'ImagenUsuarioEnvia',
		'NombreUsuarioRecibe',
		'ImagenUsuarioRecibe'
	];
}
