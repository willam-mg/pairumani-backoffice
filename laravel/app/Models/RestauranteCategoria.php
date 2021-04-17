<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteCategoria extends Model
{
    use HasFactory;

    protected $table = 'retaurante_categorias';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];
}
