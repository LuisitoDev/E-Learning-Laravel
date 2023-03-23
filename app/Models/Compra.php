<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompraFields;

/**
 * Class Compra
 * 
 * @property int $UsuarioComprador
 * @property int $CursoComprado
 * @property Carbon $FechaCreacionCompra
 * @property float $ProgresoCursoComprado
 * @property int $FormaPago
 * @property float $Pago
 * @property Carbon|null $FechaUltimaVisualizacion
 * @property Carbon|null $FechaCompletado
 * 
 * @property Curso $curso
 * @property FormaPago $forma_pago
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Compra extends Model implements CompraFields
{
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::UsuarioComprador_col => 'int',
		self::CursoComprado_col => 'int',
		self::FechaCreacionCompra_col => 'date',
		self::ProgresoCursoComprado_col => 'float',
		self::FormaPago_col => 'int',
		self::Pago_col => 'float',
		self::FechaUltimaVisualizacion_col => 'date',
		self::FechaCompletado_col => 'date'
	];

	protected $fillable = [
		self::FechaCreacionCompra_col,
		self::ProgresoCursoComprado_col,
		self::FormaPago_col,
		self::Pago_col,
		self::FechaUltimaVisualizacion_col,
		self::FechaCompletado_col
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class, self::CursoComprado_col);
	}

	public function forma_pago()
	{
		return $this->belongsTo(FormaPago::class, self::FormaPago_col);
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, self::UsuarioComprador_col);
	}
}
