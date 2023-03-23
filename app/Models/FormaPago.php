<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\FormaPagoFields;

/**
 * Class FormaPago
 * 
 * @property int $IdFormaPago
 * @property string $FormaPago
 * 
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class FormaPago extends Model implements FormaPagoFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $fillable = [
		self::FormaPago_col
	];

	public function compras()
	{
		return $this->hasMany(Compra::class, Compra::FormaPago_col);
	}
}
