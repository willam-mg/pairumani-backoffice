<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaHabitacion extends Model
{
    use HasFactory;

    const PATH = '/imagenes/habitaciones/galeria/';

    protected $table = 'galeria_habitacion';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'descripcion',
        'habitacion_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'habitacion_id' => 'integer',
    ];

    public function habitacion()
    {
        return $this->belongsTo(\App\Models\Habitacion::class);
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return urlpath(self::PATH) . $this->foto;
        }
        return null;
    }

    public static function Name($model, $galeria)
    {
        return 'foto_' . $model . '_' . $galeria;
    }

    public static function Ruta()
    {
        return public_path() . self::PATH;
    }
    public static function Urldelete()
    {
        return urlpath(self::PATH);
    }
}
