<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\LevelFields;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Level
 * 
 * @property int $id
 * @property string $title
 * @property string $path_video
 * @property string|null $path_pdf
 * @property string|null $content
 * @property bool $free_trial
 * @property int $owner_course_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property Course $owner_course
 *
 * @package App\Models
 */
class Level extends Model implements LevelFields
{
    use SoftDeletes;
	
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = true;

	protected $casts = [
		self::Free_Trial_col => 'bool',
		self::Owner_Course_col => 'int'
	];

	protected $fillable = [
		self::Title_col,
		self::Video_Path_col,
		self::PDF_Path_col,
		self::Content_col,
		self::Free_Trial_col,
		self::Owner_Course_col
	];

	public function owner_course()
	{
		return $this->belongsTo(Course::class, self::Owner_Course_col);
	}
}
