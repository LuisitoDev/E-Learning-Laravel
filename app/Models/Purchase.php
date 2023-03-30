<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseFields;

/**
 * Class Purchase
 * 
 * @property int $purchasing_user_id
 * @property int $purschased_course_id
 * @property float $progress_course
 * @property int $payment_method_id
 * @property float $payment
 * @property Carbon|null $last_view_date
 * @property Carbon|null $finished_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property Course $purchased_course
 * @property PaymentMethod $payment_method
 * @property User $purchasing_user
 *
 * @package App\Models
 */
class Purchase extends Model implements PurchaseFields
{
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::Purchasing_User_col => 'int',
		self::Purchased_Course_col => 'int',
		self::Progress_Course_col => 'float',
		self::Payment_Method_col => 'int',
		self::Payment_col => 'float',
		self::Last_View_Date_col => 'date',
		self::Finished_Date_col => 'date'
	];

	protected $fillable = [
		self::Progress_Course_col,
		self::Payment_Method_col,
		self::Payment_col,
		self::Last_View_Date_col,
		self::Finished_Date_col
	];

	public function purchased_course()
	{
		return $this->belongsTo(Course::class, self::Purchased_Course_col);
	}

	public function payment_method()
	{
		return $this->belongsTo(PaymentMethod::class, self::Payment_Method_col);
	}

	public function purchasing_user()
	{
		return $this->belongsTo(User::class, self::Purchasing_User_col);
	}
}
