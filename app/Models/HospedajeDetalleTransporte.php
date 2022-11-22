<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospedajeDetalleTransporte extends Model
{
    use HasFactory;

    protected $table = 'hospedaje_detalle_transporte';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'hospedaje_id',
        'transporte_id',
        'precio',
        'fecha',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'transporte_id' => 'integer',
        'hospedaje_id' => 'integer',
    ];

    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'transporte_id', 'id');
    }

    public function hospedaje()
    {
        return $this->belongsTo(Hospedaje::class, 'hospedaje_id', 'id');
    }
}
