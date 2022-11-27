<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaHotel extends Model
{
    use HasFactory;

    const PATH = '/imagenes/hotel/galeria/';

    protected $table = 'galeria_hotel';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'descripcion',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset(self::PATH) .'/'. $this->foto;
        }
        return null;
    }

    public static function Name()
    {
        return 'foto_' . date('ymdHis');
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
