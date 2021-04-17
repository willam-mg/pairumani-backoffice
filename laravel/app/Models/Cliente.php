<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'id';

    public $timestamps = false;

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
        'fecha_nacimiento',
        'motivo_viaje',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'fecha_nacimiento' => 'date',
    ];

    public function reservas()
    {
        return $this->hasMany(\App\Models\Reserva::class, 'cliente_id', 'id');
    }

    public function reservaslugaresturisticos()
    {
        return $this->hasMany(\App\Models\ReservaLugarTuristico::class, 'cliente_id', 'id');
    }

    public function reservaspromociones()
    {
        return $this->hasMany(\App\Models\ReservaPromocion::class, 'cliente_id', 'id');
    }
}
