<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarTuristico extends Model
{
    use HasFactory;

    const PATH = '/imagenes/lugaresturisticos/';

    protected $table = 'lugares_turisticos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'lat',
        'lng',
        'foto',
        'precio_recorrido',
        'tipo'
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function fotos()
    {
        return $this->hasMany(GaleriaLugarTuristico::class, 'lugar_turistico_id', 'id');
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
        return 'lugar_' . date('ymdHis');
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
