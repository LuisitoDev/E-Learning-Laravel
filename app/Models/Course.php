<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseFields;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property float $cost
 * @property int $creator_user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property User $creator_user
 * @property Collection|Vote[] $votes
 * @property Collection|Comment[] $comments
 * @property Collection|Purchase[] $purchases
 * @property Collection|CourseCategory[] $course_category
 * @property Collection|Category[] $categories
 * @property Collection|Level[] $levels
 *
 * @package App\Models
 */
class Course extends Model implements CourseFields
{
    use SoftDeletes;
	
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = true;

	protected $casts = [
		self::Cost_col => 'float',
		self::Creator_User_col => 'int'
	];

	protected $fillable = [
		self::Title_col,
		self::Descrption_col,
		self::Cost_col,
		self::Creator_User_col
	];

	public function creator_user()
	{
		return $this->belongsTo(User::class, self::Creator_User_col);
	}

	public function votes()
	{
		return $this->hasMany(Vote::class, Vote::Voted_Course_col);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, Comment::Commented_Course_col);
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class, Purchase::Purchased_Course_col);
	}

	public function course_category()
	{
		return $this->hasMany(CourseCategory::class, CourseCategory::Course_col);
	}

	public function categories()
    {
        return $this->belongsToMany(Category::class, CourseCategory::class, CourseCategory::Course_col, CourseCategory::Category_col);
    }

	public function levels()
	{
		return $this->hasMany(Level::class, Level::Owner_Course_col);
	}
}
