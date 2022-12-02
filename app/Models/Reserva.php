<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use HasFactory, SoftDeletes;

    const TIPO = 'reserva';

    protected $table = 'reservas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'checkin',
        'checkout',
        'adultos',
        'niños',
        'cliente_id',
        'habitacion_id',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'checkin' => 'datetime',
        'checkout' => 'datetime',
        'cliente_id' => 'integer',
        'habitacion_id' => 'integer',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class,'habitacion_id','id');
    }
}
