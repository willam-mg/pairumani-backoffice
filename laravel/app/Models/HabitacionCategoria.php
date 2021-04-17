<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabitacionCategoria extends Model
{
    use HasFactory;

    protected $table = 'habitacion_categorias';

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
