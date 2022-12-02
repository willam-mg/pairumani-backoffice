<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservaCafeteria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reservas_cafeteria';

    protected $primaryKey = 'id';

    protected $fillable = [
        'cliente_id',
        'hospedaje_id',
        'fecha',
        'hora',
        'total',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'hospedaje_id' => 'integer',
        'cliente_id' => 'integer',
        // 'fecha' => 'date',
    ];

    public function hospedaje()
    {
        return $this->belongsTo(Hospedaje::class, 'hospedaje_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function detalle()
    {
        return $this->belongsTo(CafeteriaDetalleReserva::class, 'id', 'cafeteria_reserva_id');
    }

    public function detalles()
    {
        return $this->hasMany(CafeteriaDetalleReserva::class, 'cafeteria_reserva_id', 'id');
    }
}
