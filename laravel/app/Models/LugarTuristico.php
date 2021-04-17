<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarTuristico extends Model
{
    use HasFactory;

    protected $table = 'lugares_turisticos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'lat',
        'lng',
        'foto',
        'precio_recorrido'
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];
}
