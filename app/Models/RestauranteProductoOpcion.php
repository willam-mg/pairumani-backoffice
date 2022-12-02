<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestauranteProductoOpcion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'restaurante_producto_opciones';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'precio',
        'restaurante_producto_id',
        'precio',
        'foto',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
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