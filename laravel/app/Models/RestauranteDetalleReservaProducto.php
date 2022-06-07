<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteDetalleReservaProducto extends Model
{
    use HasFactory;

    protected $table = 'restaurante_detalle_reserva_productos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'restaurante_detalle_reserva_id',
        'restaurante_producto_opciones_id',
        'restaurante_producto_tamanho_id',
        'precio_tamanho',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function detallereserva()
    {
        return $this->belongsTo(RestauranteDetalleReserva::class,'restaurante_detalle_reserva_id','id');
    }
    public function opcion()
    {
        return $this->belongsTo(RestauranteProductoOpcion::class,'restaurante_producto_opciones_id','id');
    }

    public function tamaño()
    {
        return $this->belongsTo(RestauranteProductoTamano::class,'restaurante_producto_tamanho_id','id');
    }
}
