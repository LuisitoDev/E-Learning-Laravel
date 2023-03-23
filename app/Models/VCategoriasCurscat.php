<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VCategoriasCurscat
 * 
 * @property int $IdCategoria
 * @property string $TituloCategoria
 * @property string $DescripcionCategoria
 * @property Carbon $FechaCreacionCategoria
 * @property bool $EstadoCategoria
 * @property int $UsuarioCreador
 *
 * @package App\Models
 */
class VCategoriasCurscat extends Model
{
	protected $table = 'v_categorias_curscat';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdCategoria' => 'int',
		'FechaCreacionCategoria' => 'date',
		'EstadoCategoria' => 'bool',
		'UsuarioCreador' => 'int'
	];

	protected $fillable = [
		'IdCategoria',
		'TituloCategoria',
		'DescripcionCategoria',
		'FechaCreacionCategoria',
		'EstadoCategoria',
		'UsuarioCreador'
	];
}
