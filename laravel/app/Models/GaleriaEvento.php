<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaEvento extends Model
{
    use HasFactory;

    const PATH = '/imagenes/eventos/galeria/';

    protected $table = 'galeria_evento';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'evento_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'evento_id' => 'integer',
    ];

    public function evento()
    {
        return $this->belongsTo(\App\Models\Evento::class);
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
