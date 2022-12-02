<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HabitacionCategoria extends Model
{
    use HasFactory, SoftDeletes;

    const PATH = '/imagenes/habitaciones/categorias/';

    protected $table = 'habitacion_categorias';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
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
    ];

    public function habitaciones()
    {
        return $this->hasMany(habitacion::class, 'habitacion_categoria_id', 'id');
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
        return 'habitacioncategoria_' . date('ymdHis');
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
