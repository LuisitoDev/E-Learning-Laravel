<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\RolFields;

/**
 * Class Rol
 * 
 * @property int $IdRol
 * @property string $TipoRol
 * 
 * @property Collection|Usurol[] $usurols
 *
 * @package App\Models
 */
class Rol extends Model implements RolFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $fillable = [
		self::TipoRol_col
	];

	public function usurols()
	{
		return $this->hasMany(Usurol::class, Usurol::IdRol_col);
	}

	public function usuarios()
    {
        return $this->belongsToMany(Rol::class, Usurol::class, Usurol::IdRol_col, Usurol::IdUsuario_col);
    }
}
