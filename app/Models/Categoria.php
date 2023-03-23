<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaFields;

/**
 * Class Categoria
 * 
 * @property int $IdCategoria
 * @property string $TituloCategoria
 * @property string $DescripcionCategoria
 * @property Carbon $FechaCreacionCategoria
 * @property bool $EstadoCategoria
 * @property int $UsuarioCreador
 * 
 * @property Usuario $usuario
 * @property Collection|Curscat[] $curscats
 *
 * @package App\Models
 */
class Categoria extends Model implements CategoriaFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $casts = [
		self::FechaCreacionCategoria_col => 'date',
		self::EstadoCategoria_col => 'bool',
		self::UsuarioCreador_col => 'int'
	];

	protected $fillable = [
		self::TituloCategoria_col,
		self::DescripcionCategoria_col,
		self::FechaCreacionCategoria_col,
		self::EstadoCategoria_col,
		self::UsuarioCreador_col
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, self::UsuarioCreador_col);
	}

	public function curscats()
	{
		return $this->hasMany(Curscat::class, Curscat::IdCategoria_col);
	}

	public function cursos()
    {
        return $this->belongsToMany(Curso::class, Curscat::class, Curscat::IdCategoria_col, Curscat::IdCurso_col);
    }
}
