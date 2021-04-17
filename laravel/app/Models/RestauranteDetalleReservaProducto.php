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
        'restaurante_producto_opciones_id',
        'restaurante_producto_tamanho_id',
        'cantidad',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];


    public function restauranteproductoopciones()
    {
        return $this->hasMany(\App\Models\RestauranteProductoOpcion::class,'id', 'restaurante_producto_opciones_id');
    }

    public function restauranteProductoTamanos()
    {
        return $this->hasMany(\App\Models\RestauranteProductoTamano::class,'id', 'restaurante_producto_tamanho_id');
    }
}
