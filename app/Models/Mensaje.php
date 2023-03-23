<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\MensajeFields;

/**
 * Class Mensaje
 * 
 * @property int $IdMensaje
 * @property int $UsuarioEnvia
 * @property int $UsuarioRecibe
 * @property string $DescripcionMensaje
 * @property Carbon $FechaCreacionMensaje
 * @property bool $EstadoMensaje
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Mensaje extends Model implements MensajeFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $casts = [
		self::UsuarioEnvia_col => 'int',
		self::UsuarioRecibe_col => 'int',
		self::FechaCreacionMensaje_col => 'date',
		self::EstadoMensaje_col => 'bool'
	];

	protected $fillable = [
		self::UsuarioEnvia_col,
		self::UsuarioRecibe_col,
		self::DescripcionMensaje_col,
		self::FechaCreacionMensaje_col,
		self::EstadoMensaje_col
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, self::UsuarioRecibe_col);
	}
}
