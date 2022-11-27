<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    const PATH = '/imagenes/habitaciones/';

    protected $table = 'habitaciones';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'num_habitacion',
        'habitacion_categoria_id',
        'foto',
        'nombre',
        'descripcion',
        'precio',
        'capacidad_minima',
        'capacidad_maxima',
        'estado',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'habitacion_categoria_id' => 'integer',
    ];

    public function categoria()
    {
        return $this->belongsTo(HabitacionCategoria::class,'habitacion_categoria_id','id');
    }

    public function hospedaje()
    {
        return $this->belongsTo(Hospedaje::class, 'id', 'habitacion_id');
    }

    public function promocion()
    {
        return $this->belongsTo(Promocion::class,'id', 'habitacion_id');
    }

    public function frigobars()
    {
        return $this->hasMany(HabitacionFrigobar::class,'habitacion_id','id');
    }

    public function fotos()
    {
        return $this->hasMany(GaleriaHabitacion::class, 'habitacion_id', 'id');
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
        return 'habitacion_' . date('ymdHis');
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
