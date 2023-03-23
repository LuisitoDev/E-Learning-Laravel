<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComentarioFields;

/**
 * Class Comentario
 * 
 * @property int $IdComentario
 * @property int $UsuarioComento
 * @property int $CursoComentado
 * @property string $DescripcionComentario
 * @property Carbon $FechaCreacionComentario
 * @property bool $EstadoComentario
 * 
 * @property Curso $curso
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Comentario extends Model implements ComentarioFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $casts = [
		self::UsuarioComento_col => 'int',
		self::CursoComentado_col => 'int',
		self::FechaCreacionComentario_col => 'date',
		self::EstadoComentario_col => 'bool'
	];

	protected $fillable = [
		self::UsuarioComento_col,
		self::CursoComentado_col,
		self::DescripcionComentario_col,
		self::FechaCreacionComentario_col,
		self::EstadoComentario_col
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class, self::CursoComentado_col);
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, self::UsuarioComento_col);
	}
}
