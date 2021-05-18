<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaRestauranteProducto extends Model
{
    use HasFactory;

    const PATH = '/imagenes/restaurantes/galeria/';

    protected $table = 'galeria_restaurante_producto';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'restaurante_producto_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'restaurante_producto_id' => 'integer',
    ];


    public function producto()
    {
        return $this->belongsTo(RestauranteProducto::class, 'restaurante_producto_id', 'id');
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
