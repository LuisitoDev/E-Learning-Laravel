<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\CalificacionFields;
/**
 * Class Calificacion
 * 
 * @property int $UsuarioCalifico
 * @property int $CursoCalificado
 * @property bool $UtilidadCalificacion
 * @property Carbon $FechaCreacionCalificacion
 * @property bool $EstadoCalificacion
 * 
 * @property Curso $curso
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Calificacion extends Model implements CalificacionFields
{
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::UsuarioCalifico_col => 'int',
		self::CursoCalificado_col => 'int',
		self::UtilidadCalificacion_col => 'bool',
		self::FechaCreacionCalificacion_col => 'date',
		self::EstadoCalificacion_col => 'bool'
	];

	protected $fillable = [
		self::UtilidadCalificacion_col,
		self::FechaCreacionCalificacion_col,
		self::EstadoCalificacion_col
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class, self::CursoCalificado_col);
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, self::UsuarioCalifico_col);
	}
}
