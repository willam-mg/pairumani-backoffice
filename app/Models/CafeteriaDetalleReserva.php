<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeteriaDetalleReserva extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cafeteria_detalle_reserva';

    protected $primaryKey = 'id';

    protected $fillable = [
        'cafeteria_reserva_id',
        'cafeteria_producto_id',
        'precio',
        'cantidad',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cafeteria_reserva_id' => 'integer',
    ];


    public function producto()
    {
        return $this->belongsTo(CafeteriaProducto::class,'cafeteria_producto_id','id');
    }

    public function reserva()
    {
        return $this->belongsTo(ReservaCafeteria::class, 'cafeteria_reserva_id','id');
    }

    public function detalleproducto()
    {
        return $this->belongsTo(CafeteriaDetalleReservaProducto::class,'id', 'cafeteria_detalle_reserva_id');
    }

    public function detallesproductos()
    {
        return $this->hasMany(CafeteriaDetalleReservaProducto::class, 'cafeteria_detalle_reserva_id','id');
    }
}
