<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoleFields;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $type
 * 
 * @property Collection|UserRole[] $user_role
 * @property Collection|User[] $users
 * 
 * @package App\Models
 */
class Role extends Model implements RoleFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $fillable = [
		self::Type_col
	];

	public function user_role()
	{
		return $this->hasMany(UserRole::class, UserRole::Role_col);
	}

	public function users()
    {
        return $this->belongsToMany(Role::class, UserRole::class, UserRole::Role_col, UserRole::User_col);
    }
}
