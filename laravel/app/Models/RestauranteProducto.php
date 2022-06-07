<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteProducto extends Model
{
    use HasFactory;

    const PATH = '/imagenes/restaurantes/productos/';

    protected $table = 'restaurante_productos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'restaurante_categoria_id',
        'descripcion',
        'precio',
        'foto',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'restaurante_categoria_id' => 'integer',
    ];


    public function categoria()
    {
        return $this->belongsTo(RestauranteCategoria::class, 'restaurante_categoria_id', 'id');
    }

    public function fotos()
    {
        return $this->hasMany(GaleriaRestauranteProducto::class, 'restaurante_producto_id', 'id');
    }

    public function opciones()
    {
        return $this->hasMany(RestauranteProductoOpcion::class,'restaurante_producto_id','id');
    }

    public function opcion()
    {
        return $this->belongsTo(RestauranteProductoOpcion::class,'id', 'restaurante_producto_id');
    }

    public function tamanos()
    {
        return $this->hasMany(RestauranteProductoTamano::class,'restaurante_producto_id','id');
    }

    public function tamano()
    {
        return $this->belongsTo(RestauranteProductoTamano::class,'id', 'restaurante_producto_id');
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return urlpath(self::PATH) . $this->foto;
        }
        return null;
    }

    ///FOTO
    public static function Namefoto()
    {
        return 'producto_' . date('ymdHis');
    }

    public static function Rutafoto()
    {
        return public_path() . self::PATH;
    }
    public static function Urldeletefoto()
    {
        return urlpath(self::PATH);
    }
}
