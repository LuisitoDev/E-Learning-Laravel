<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethodFields;

/**
 * Class PaymentMethod
 * 
 * @property int $id
 * @property string $method
 * 
 * @property Collection|Purchase[] $purchases
 *
 * @package App\Models
 */
class PaymentMethod extends Model implements PaymentMethodFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $fillable = [
		self::Method_col
	];

	public function purchases()
	{
		return $this->hasMany(Purchase::class, Purchase::Payment_Method_col);
	}
}
