<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeteriaDetalleReservaProducto extends Model
{
    use HasFactory;

    protected $table = 'caf_det_reserv_productos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'cafeteria_detalle_reserva_id',
        'cafeteria_producto_opciones_id',
        'cafeteria_producto_tamano_id',
        'precio_tamanho',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function detallereserva()
    {
        return $this->belongsTo(CafeteriaDetalleReserva::class,'cafeteria_detalle_reserva_id','id');
    }
    public function opcion()
    {
        return $this->belongsTo(CafeteriaProductoOpcion::class,'cafeteria_producto_opciones_id','id');
    }

    public function tamaño()
    {
        return $this->belongsTo(CafeteriaProductoTamano::class,'cafeteria_producto_tamano_id','id');
    }
}
