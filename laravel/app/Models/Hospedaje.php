<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    use HasFactory;

    const TIPO = 'hospedaje';

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
        'precio',
        'adultos',
        'niños'
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        // 'fecha_checkin' => 'date',
        // 'fecha_checkout' => 'date',
        'habitacion_id' => 'integer',
        'reserva_restaurante_id' => 'integer',
        'transporte_id' => 'integer',
        'reserva_lugar_turistico_id' => 'integer',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class,'habitacion_id','id');
    }

    public function reservarestaurante()
    {
        return $this->belongsTo(ReservaRestaurante::class, 'reserva_restaurante_id','id');
    }

    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'transporte_id','id');
    }

    public function reservalugarturistico()
    {
        return $this->belongsTo(ReservaLugarTuristico::class, 'reserva_lugar_turistico_id','id');
    }

    public function detalleacompanantes()
    {
        return $this->hasMany(HospedajeDetalleAcompanante::class,'hospedaje_id','id');
    }

    public function detalletransportes()
    {
        return $this->hasMany(HospedajeDetalleTransporte::class,'hospedaje_id','id');
    }
}
