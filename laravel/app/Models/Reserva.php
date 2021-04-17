<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'checkin',
        'checkout',
        'adultos',
        'niños',
        'cliente_id',
        'habitacion_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'checkin' => 'date',
        'checkout' => 'date',
        'cliente_id' => 'integer',
        'habitacion_id' => 'integer',
    ];


    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class,'cliente_id','id');
    }

    public function habitacion()
    {
        return $this->belongsTo(\App\Models\Habitacion::class,'habitacion_id','id');
    }
}
