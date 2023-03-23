<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VUltimoMensajeConversacion
 * 
 * @property int $Usuario_1
 * @property int $Usuario_2
 * @property Carbon|null $FechaCreacionMensaje
 *
 * @package App\Models
 */
class VUltimoMensajeConversacion extends Model
{
	protected $table = 'v_ultimo_mensaje_conversacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Usuario_1' => 'int',
		'Usuario_2' => 'int',
		'FechaCreacionMensaje' => 'date'
	];

	protected $fillable = [
		'Usuario_1',
		'Usuario_2',
		'FechaCreacionMensaje'
	];
}
