<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeteriaProducto extends Model
{
    use HasFactory, SoftDeletes;

    const PATH = '/imagenes/cafeteria/productos/';

    protected $table = 'cafeteria_productos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'cafeteria_categoria_id',
        'descripcion',
        'precio',
        'foto',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cafeteria_categoria_id' => 'integer',
    ];


    public function categoria()
    {
        return $this->belongsTo(CafeteriaCategoria::class, 'cafeteria_categoria_id', 'id');
    }

    public function fotos()
    {
        return $this->hasMany(GaleriaCafeteriaProducto::class, 'cafeteria_producto_id', 'id');
    }

    public function opciones()
    {
        return $this->hasMany(CafeteriaProductoOpcion::class,'cafeteria_producto_id','id');
    }

    public function opcion()
    {
        return $this->belongsTo(CafeteriaProductoOpcion::class,'id', 'cafeteria_producto_id');
    }

    public function tamanos()
    {
        return $this->hasMany(CafeteriaProductoTamano::class,'cafeteria_producto_id','id');
    }

    public function tamano()
    {
        return $this->belongsTo(CafeteriaProductoTamano::class,'id', 'cafeteria_producto_id');
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset(self::PATH) .'/'. $this->foto;
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
