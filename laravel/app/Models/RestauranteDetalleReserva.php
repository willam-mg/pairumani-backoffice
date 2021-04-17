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
        'cantidad',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'restaurante_reserva_id' => 'integer',
    ];


    public function restauranteProductos()
    {
        return $this->hasMany(\App\Models\RestauranteProducto::class,'id','restaurante_producto_id');
    }

    public function restauranteReserva()
    {
        return $this->belongsTo(\App\Models\RestauranteReserva::class, 'restaurante_reserva_id','id');
    }
}
