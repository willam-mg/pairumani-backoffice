<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    const PATH = '/imagenes/promociones/';

    protected $table = 'promociones';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'precio',
        'estado',
        'habitacion_id'
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function reservaspromociones()
    {
        return $this->hasMany(ReservaPromocion::class, 'promocion_id', 'id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class,'habitacion_id','id');
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
        return 'promocion_' . date('ymdHis');
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
