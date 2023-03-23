<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\CursoFields;

/**
 * Class Curso
 * 
 * @property int $IdCurso
 * @property string $TituloCurso
 * @property string $DescripcionCurso
 * @property string|null $ImagenCurso
 * @property float $CostoCurso
 * @property Carbon $FechaCreacionCurso
 * @property bool $EstadoCurso
 * @property int $UsuarioCreador
 * 
 * @property Usuario $usuario
 * @property Collection|Calificacion[] $calificaciones
 * @property Collection|Comentario[] $comentarios
 * @property Collection|Compra[] $compras
 * @property Collection|Curscat[] $curscats
 * @property Collection|Nivel[] $niveles
 *
 * @package App\Models
 */
class Curso extends Model implements CursoFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $casts = [
		self::CostoCurso_col => 'float',
		self::FechaCreacionCurso_col => 'date',
		self::EstadoCurso_col => 'bool',
		self::UsuarioCreador_col => 'int'
	];

	protected $fillable = [
		self::TituloCurso_col,
		self::DescripcionCurso_col,
		self::ImagenCurso_col,
		self::CostoCurso_col,
		self::FechaCreacionCurso_col,
		self::EstadoCurso_col,
		self::UsuarioCreador_col
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, self::UsuarioCreador_col);
	}

	public function calificaciones()
	{
		return $this->hasMany(Calificacion::class, Calificacion::CursoCalificado_col);
	}

	public function comentarios()
	{
		return $this->hasMany(Comentario::class, Comentario::CursoComentado_col);
	}

	public function compras()
	{
		return $this->hasMany(Compra::class, Compra::CursoComprado_col);
	}

	public function curscats()
	{
		return $this->hasMany(Curscat::class, Curscat::IdCurso_col);
	}

	public function categorias()
    {
        return $this->belongsToMany(Categoria::class, Curscat::class, Curscat::IdCurso_col, Curscat::IdCategoria_col);
    }

	public function niveles()
	{
		return $this->hasMany(Nivel::class, Nivel::CursoImpartido_col);
	}
}
