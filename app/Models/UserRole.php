<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserRoleFields;

/**
 * Class UserRole
 * 
 * @property int $user_id
 * @property int $role_id
 * 
 * @property Role $role
 * @property User $user
 *
 * @package App\Models
 */
class UserRole extends Model implements UserRoleFields
{
	protected $table = self::table_name;
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::User_col => 'int',
		self::Role_col => 'int'
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		self::User_col,
		self::Role_col
	];

	public function role()
	{
		return $this->belongsTo(Role::class, self::Role_col);
	}

	public function user()
	{
		return $this->belongsTo(User::class, self::User_col);
	}
}
