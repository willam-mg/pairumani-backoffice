<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'fecha',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'fecha' => 'date',
    ];
}
