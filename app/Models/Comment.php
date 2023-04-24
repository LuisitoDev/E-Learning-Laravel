<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentFields;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * 
 * @property int $id
 * @property int $commenting_user_id
 * @property int $commented_course_id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property Course $commented_course
 * @property User $commenting_user
 *
 * @package App\Models
 */
class Comment extends Model implements CommentFields
{
    use SoftDeletes;
	
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = true;

	protected $casts = [
		self::Commenting_User_col => 'int',
		self::Commented_Course_col => 'int'
	];

	protected $fillable = [
		self::Commenting_User_col,
		self::Commented_Course_col,
		self::Description_col
	];

	public function commented_course()
	{
		return $this->belongsTo(Course::class, self::Commented_Course_col);
	}

	public function commenting_user()
	{
		return $this->belongsTo(User::class, self::Commenting_User_col);
	}
}
