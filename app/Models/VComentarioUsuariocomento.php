<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VComentarioUsuariocomento
 * 
 * @property int $IdComentario
 * @property int $UsuarioComento
 * @property int $CursoComentado
 * @property string $DescripcionComentario
 * @property Carbon $FechaCreacionComentario
 * @property bool $EstadoComentario
 * @property string|null $NombreCompletoUsuarioComento
 * @property string|null $ImagenPerfilUsuarioComento
 *
 * @package App\Models
 */
class VComentarioUsuariocomento extends Model
{
	protected $table = 'v_comentario_usuariocomento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdComentario' => 'int',
		'UsuarioComento' => 'int',
		'CursoComentado' => 'int',
		'FechaCreacionComentario' => 'date',
		'EstadoComentario' => 'bool'
	];

	protected $fillable = [
		'IdComentario',
		'UsuarioComento',
		'CursoComentado',
		'DescripcionComentario',
		'FechaCreacionComentario',
		'EstadoComentario',
		'NombreCompletoUsuarioComento',
		'ImagenPerfilUsuarioComento'
	];
}
