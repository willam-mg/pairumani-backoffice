<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteDetalleReserva extends Model
{
    use HasFactory;

    protected $table = 'restaurante_detalle_reserva';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'restaurante_reserva_id',
        'restaurante_producto_id',
        'precio',
        'cantidad',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'restaurante_reserva_id' => 'integer',
        'restaurante_producto_id' => 'integer',
    ];


    public function producto()
    {
        return $this->belongsTo(RestauranteProducto::class,'restaurante_producto_id','id');
    }

    public function reserva()
    {
        return $this->belongsTo(RestauranteReserva::class, 'restaurante_reserva_id','id');
    }

    public function detalleproducto()
    {
        return $this->belongsTo(RestauranteDetalleReservaProducto::class,'id', 'restaurante_detalle_reserva_id');
    }

    public function detallesproductos()
    {
        return $this->hasMany(RestauranteDetalleReservaProducto::class, 'restaurante_detalle_reserva_id','id');
    }
}
