<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserFields;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $first_surname
 * @property string|null $second_surname
 * @property Carbon $birthday
 * @property string $email
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * @property Collection|Vote[] $votes
 * @property Collection|Category[] $categories
 * @property Collection|Comment[] $comments
 * @property Collection|Purchase[] $purchases
 * @property Collection|Course[] $courses
 * @property Collection|UserRole[] $user_role
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class User extends Model implements UserFields
{
    use HasApiTokens, SoftDeletes;

    protected $table = self::table_name;
    protected $primaryKey = self::Id_col;
    public $timestamps = true;

    protected $casts = [
        self::Birthday_col => 'date',
    ];

    protected $fillable = [
        self::Name_col,
        self::First_Surname_col,
        self::Second_Surname_col,
        self::Birthday_col,
        self::Email_col,
        self::Password_col
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->name.($this->first_surname ? ' '.$this->first_surname : '').($this->second_surname ? ' '.$this->second_surname : '');
    }

    // public function authorizeRoles($roles)
    // {
    //     if ($this->hasAnyRole($roles)) {
    //         return true;
    //     }
    //     abort(401, 'This action is unauthorized.');
    // }

    // public function hasAnyRole($roles)
    // {
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasRole($role)) {
    //                 return true;
    //             }
    //         }
    //     } else {
    //         if ($this->hasRole($roles)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    public function hasRole($role)
    {
        if ($this->roles()->where(Role::Type_col, $role)->first()) {
            return true;
        }
        return false;
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, Vote::Voting_User_col);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, Category::Creator_User_col);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, Comment::Commenting_User_col);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, Purchase::Purchasing_User_col);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, Course::Creator_User_col);
    }

    public function user_role()
    {
        return $this->hasMany(UserRole::class, UserRole::User_col);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, UserRole::class, UserRole::User_col, UserRole::Role_col);
    }
}
