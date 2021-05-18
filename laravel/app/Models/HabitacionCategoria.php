<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabitacionCategoria extends Model
{
    use HasFactory;

    const PATH = '/imagenes/habitaciones/categorias/';

    protected $table = 'habitacion_categorias';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

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
