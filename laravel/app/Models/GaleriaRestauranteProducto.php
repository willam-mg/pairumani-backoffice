<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaRestauranteProducto extends Model
{
    use HasFactory;

    protected $table = 'galeria_restaurante_producto';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'producto_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'producto_id' => 'integer',
    ];


    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class, 'producto_id','id');
    }
}
