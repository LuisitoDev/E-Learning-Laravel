<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryFields;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $creator_user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property User $creator_user
 * @property Collection|CourseCategory[] $course_category
 * @property Collection|Course[] $courses
 * 
 * @package App\Models
 */
class Category extends Model implements CategoryFields
{
    use SoftDeletes;
	
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = true;

	protected $casts = [
		self::Creator_User_col => 'int'
	];

	protected $fillable = [
		self::Title_col,
		self::Description_col,
		self::Creator_User_col
	];

	public function creator_user()
	{
		return $this->belongsTo(User::class, self::Creator_User_col);
	}

	public function course_category()
	{
		return $this->hasMany(CourseCategory::class, CourseCategory::Category_col);
	}

	public function courses()
    {
        return $this->belongsToMany(Course::class, CourseCategory::class, CourseCategory::Category_col, CourseCategory::Course_col);
    }
}
