<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaLugarTuristico extends Model
{
    use HasFactory;

    const PATH = '/imagenes/lugaresturisticos/galeria/';

    protected $table = 'galeria_lugares_turisticos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'descripcion',
        'lugar_turistico_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'lugar_turistico_id' => 'integer',
    ];

    public function lugarTuristico()
    {
        return $this->belongsTo(\App\Models\LugarTuristico::class);
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
