<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaRestaurante extends Model
{
    use HasFactory;

    protected $table = 'reservas_restaurante';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'hospedaje_id',
        'fecha',
        'hora',
        'total',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'hospedaje_id' => 'integer',
        'fecha' => 'date',
    ];

    public function hospedaje()
    {
        return $this->belongsTo(\App\Models\Hospedaje::class);
    }
}
