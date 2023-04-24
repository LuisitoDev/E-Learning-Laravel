<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoteFields;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Vote
 * 
 * @property int $voting_user_id
 * @property int $voted_course_id
 * @property bool $value
 * 
 * @property Course $voted_course
 * @property User $voting_user
 *
 * @package App\Models
 */
class Vote extends Model implements VoteFields
{
    use SoftDeletes;
	
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = true;

	protected $casts = [
		self::Voting_User_col => 'int',
		self::Voted_Course_col => 'int',
		self::Value_col => 'bool',
	];

	protected $fillable = [
		self::Value_col,
	];

	public function voted_course()
	{
		return $this->belongsTo(Course::class, self::Voted_Course_col);
	}

	public function voting_user()
	{
		return $this->belongsTo(User::class, self::Voting_User_col);
	}
}
