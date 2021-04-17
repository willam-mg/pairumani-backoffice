<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaHabitacion extends Model
{
    use HasFactory;

    protected $table = 'galeria_habitacion';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'descripcion',
        'habitacion_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'habitacion_id' => 'integer',
    ];


    public function habitacion()
    {
        return $this->belongsTo(\App\Models\Habitacion::class, 'habitacion_id', 'id');
    }
}
