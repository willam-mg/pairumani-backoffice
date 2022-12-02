<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const TIPO = '1';
    const TIPOGMAIL = '2';
    const TIPOFACE = '3';
    const PATH = '/imagenes/clientes/';

    protected $table = 'clientes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombres',
        'apellidos',
        'tipo_documento',
        'num_documento',
        'celular',
        'direccion',
        'ciudad',
        'pais',
        'oficio',
        'empresa',
        'telefono',
        'email',
        'password',
        'api_token',
        'imei_celular',
        'fecha_nacimiento',
        'motivo_viaje',
        'foto',
    ];

    protected $guarded = [];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        // 'api_token',
        // 'imei_celular'
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function getNombreCompletoAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }

    public function acompañantes()
    {
        return $this->hasMany(Acompanante::class,'cliente_id','id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'cliente_id', 'id');
    }

    public function reservaslugaresturisticos()
    {
        return $this->hasMany(ReservaLugarTuristico::class, 'cliente_id', 'id');
    }

    public function reservaspromociones()
    {
        return $this->hasMany(ReservaPromocion::class, 'cliente_id', 'id');
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            if (strpos($this->foto, 'platform-lookaside') !== false) {
                return $this->foto;
            }
            if (strpos($this->foto, 'google') !== false) {
                return $this->foto;
            }
            return asset(self::PATH) .'/'. $this->foto;
        }
        return null;
    }

    public static function Name()
    {
        return 'cliente_' . date('ymdhis');
    }

    public static function Ruta()
    {
        return public_path() . self::PATH;
    }
    public static function Urldelete()
    {
        return urlpath(self::PATH);
    }

    public function hospedajes()
    {
        return $this->hasMany(Hospedaje::class, 'cliente_id', 'id');
    }
}
