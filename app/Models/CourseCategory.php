<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseCategoryFields;

/**
 * Class CourseCategory
 * 
 * @property int $course_id
 * @property int $category_id
 * 
 * @property Course $course
 * @property Category $category
 *
 * @package App\Models
 */
class CourseCategory extends Model implements CourseCategoryFields
{
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::Course_col => 'int',
		self::Category_col => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class, self::Course_col);
	}

	public function category()
	{
		return $this->belongsTo(Category::class, self::Category_col);
	}
}
