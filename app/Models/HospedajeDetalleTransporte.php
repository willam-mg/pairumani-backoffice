<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HospedajeDetalleTransporte extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hospedaje_detalle_transporte';

    protected $primaryKey = 'id';

    protected $fillable = [
        'hospedaje_id',
        'transporte_id',
        'precio',
        'fecha',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
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
