<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitaciones';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'num_habitacion',
        'categoria_id',
        'foto',
        'nombre',
        'descripcion',
        'precio',
        'capacidad_minima',
        'estado',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'habitacion_categoria_id' => 'integer',
    ];


    public function habitacionCategoria()
    {
        return $this->belongsTo(\App\Models\HabitacionCategoria::class,'habitacion_categoria_id','id');
    }
}
