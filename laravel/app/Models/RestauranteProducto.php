<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteProducto extends Model
{
    use HasFactory;

    protected $table = 'restaurante_productos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'restaurante_categoria_id',
        'descripcion',
        'precio',
        'foto',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'restaurante_categoria_id' => 'integer',
    ];


    public function restauranteCategoria()
    {
        return $this->belongsTo(\App\Models\RestauranteCategoria::class, 'restaurante_categoria_id','id');
    }
}
