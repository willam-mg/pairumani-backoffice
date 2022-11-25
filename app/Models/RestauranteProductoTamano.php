<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteProductoTamano extends Model
{
    use HasFactory;

    protected $table = 'restaurante_producto_tamano';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'precio',
        'restaurante_producto_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'restaurante_producto_id' => 'integer',
    ];

    public function producto()
    {
        return $this->belongsTo(RestauranteProducto::class, 'restaurante_producto_id', 'id');
    }
}