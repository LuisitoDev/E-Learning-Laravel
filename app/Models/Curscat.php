<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CurscatFields;

/**
 * Class Curscat
 * 
 * @property int $IdCurso
 * @property int $IdCategoria
 * 
 * @property Curso $curso
 * @property Categoria $categoria
 *
 * @package App\Models
 */
class Curscat extends Model implements CurscatFields
{
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::IdCurso_col => 'int',
		self::IdCategoria_col => 'int'
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class, self::IdCurso_col);
	}

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, self::IdCategoria_col);
	}
}
