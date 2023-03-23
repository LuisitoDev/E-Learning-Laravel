<?php

declare( strict_types = 1 );

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsuarioFields;

/**
 * Class Usuario
 * 
 * @property int $IdUsuario
 * @property string $NombreUsuario
 * @property string $ApellidoPaternoUsuario
 * @property string $ApellidoMaternoUsuario
 * @property string $GeneroUsuario
 * @property Carbon $FechaNacimientoUsuario
 * @property string|null $ImagenPerfilUsuario
 * @property string $CorreoUsuario
 * @property string $PasswordUsuario
 * @property Carbon $FechaCreacionUsuario
 * @property bool $EstadoUsuario
 * 
 * @property Collection|Calificacion[] $calificaciones
 * @property Collection|Categoria[] $categorias
 * @property Collection|Comentario[] $comentarios
 * @property Collection|Compra[] $compras
 * @property Collection|Curso[] $cursos
 * @property Collection|Mensaje[] $mensajes
 * @property Collection|Usurol[] $usurols
 *
 * @package App\Models
 */
class Usuario extends Model implements UsuarioFields
{
	protected $table = self::table_name;
	protected $primaryKey = self::Id_col;
	public $timestamps = false;

	protected $casts = [
		self::FechaNacimientoUsuario_col => 'date',
		self::FechaCreacionUsuario_col => 'date',
		self::EstadoUsuario_col => 'bool'
	];

	protected $fillable = [
		self::NombreUsuario_col,
		self::ApellidoPaternoUsuario_col,
		self::ApellidoMaternoUsuario_col,
		self::GeneroUsuario_col,
		self::FechaNacimientoUsuario_col,
		self::CorreoUsuario_col,
		self::PasswordUsuario_col,
		self::FechaCreacionUsuario_col,
		self::EstadoUsuario_col
	];

	public function calificaciones()
	{
		return $this->hasMany(Calificacion::class, Calificacion::UsuarioCalifico_col);
	}

	public function categorias()
	{
		return $this->hasMany(Categoria::class, Categoria::UsuarioCreador_col);
	}

	public function comentarios()
	{
		return $this->hasMany(Comentario::class, Comentario::UsuarioComento_col);
	}

	public function compras()
	{
		return $this->hasMany(Compra::class, Compra::UsuarioComprador_col);
	}

	public function cursos()
	{
		return $this->hasMany(Curso::class, Curso::UsuarioCreador_col);
	}

	public function mensajes()
	{
		return $this->hasMany(Mensaje::class, Mensaje::UsuarioRecibe_col);
	}

	public function usurols()
	{
		return $this->hasMany(Usurol::class, Usurol::IdUsuario_col);
	}

	public function roles()
    {
        return $this->belongsToMany(Rol::class, Usurol::class, Usurol::IdUsuario_col, Usurol::IdRol_col);
    }
}
