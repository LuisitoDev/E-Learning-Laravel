<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\NivelFields;

/**
 * Class Nivel
 * 
 * @property int $IdNivel
 * @property string $TituloNivel
 * @property string $PathVideoNivel
 * @property string|null $PathPDFNivel
 * @property string|null $ContenidoNivel
 * @property bool $NivelGratis
 * @property Carbon $FechaCreacionNivel
 * @property bool $EstadoNivel
 * @property int $CursoImpartido
 * 
 * @property Curso $curso
 *
 * @package App\Models
 */
class Nivel extends Model implements NivelFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $casts = [
		self::NivelGratis_col => 'bool',
		self::FechaCreacionNivel_col => 'date',
		self::EstadoNivel_col => 'bool',
		self::CursoImpartido_col => 'int'
	];

	protected $fillable = [
		self::TituloNivel_col,
		self::PathVideoNivel_col,
		self::PathPDFNivel_col,
		self::ContenidoNivel_col,
		self::NivelGratis_col,
		self::FechaCreacionNivel_col,
		self::EstadoNivel_col,
		self::CursoImpartido_col
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class, self::CursoImpartido_col);
	}
}
