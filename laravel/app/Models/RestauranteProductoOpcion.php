<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteProductoOpcion extends Model
{
    use HasFactory;

    protected $table = 'restaurante_producto_opciones';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'precio',
        'restaurante_producto_id',
        'precio',
        'foto',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'restaurante_producto_id' => 'integer',
    ];


    public function producto()
    {
        return $this->belongsTo(\App\Models\RestauranteProducto::class,'restaurante_producto_id','id');
    }
}