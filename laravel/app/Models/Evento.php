<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    const PATH = '/imagenes/eventos/';

    protected $table = 'eventos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'fecha',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        // 'fecha' => 'date',
    ];

    public function fotos()
    {
        return $this->hasMany(GaleriaEvento::class, 'evento_id', 'id');
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
        return 'evento_' . date('ymdHis');
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
