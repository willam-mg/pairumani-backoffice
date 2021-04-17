<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    use HasFactory;

    protected $table = 'hospedajes';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'fecha_checkin',
        'fecha_checkout',
        'habitacion_id',
        'reserva_restaurante_id',
        'transporte_id',
        'reserva_lugar_turistico_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'fecha_checkin' => 'date',
        'fecha_checkout' => 'date',
        'habitacion_id' => 'integer',
        'reserva_restaurante_id' => 'integer',
        'transporte_id' => 'integer',
        'reserva_lugar_turistico_id' => 'integer',
    ];


    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class,'cliente_id','id');
    }

    public function habitacion()
    {
        return $this->belongsTo(\App\Models\Habitacion::class,'habitacion_id','id');
    }

    public function reservaRestaurante()
    {
        return $this->belongsTo(\App\Models\ReservaRestaurante::class,'reserva_restaurante_id','id');
    }

    public function transporte()
    {
        return $this->belongsTo(\App\Models\Transporte::class,'transporte_id','id');
    }

    public function reservalugarturistico()
    {
        return $this->belongsTo(\App\Models\ReservaLugarTuristico::class,'reserva_lugar_turistico_id','id');
    }
}
