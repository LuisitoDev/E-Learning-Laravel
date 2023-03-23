<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VCursosUsuariocreadorCalificacion
 * 
 * @property int $IdCurso
 * @property string $TituloCurso
 * @property string $DescripcionCurso
 * @property string|null $ImagenCurso
 * @property float $CostoCurso
 * @property Carbon $FechaCreacionCurso
 * @property bool $EstadoCurso
 * @property int $UsuarioCreador
 * @property string|null $NombreCompletoUsuarioCreador
 * @property string|null $ImagenPerfilUsuarioCreador
 * @property float|null $PorcentajeCalificacion
 *
 * @package App\Models
 */
class VCursosUsuariocreadorCalificacion extends Model
{
	protected $table = 'v_cursos_usuariocreador_calificacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdCurso' => 'int',
		'CostoCurso' => 'float',
		'FechaCreacionCurso' => 'date',
		'EstadoCurso' => 'bool',
		'UsuarioCreador' => 'int',
		'PorcentajeCalificacion' => 'float'
	];

	protected $fillable = [
		'IdCurso',
		'TituloCurso',
		'DescripcionCurso',
		'ImagenCurso',
		'CostoCurso',
		'FechaCreacionCurso',
		'EstadoCurso',
		'UsuarioCreador',
		'NombreCompletoUsuarioCreador',
		'ImagenPerfilUsuarioCreador',
		'PorcentajeCalificacion'
	];
}
