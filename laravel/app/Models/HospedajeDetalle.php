<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospedajeDetalle extends Model
{
    use HasFactory;

    protected $table = 'hospedaje_detalle';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'hospedaje_id',
        'acompanante_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'hospedaje_id' => 'integer',
    ];

    public function acompanantes()
    {
        return $this->hasMany(\App\Models\Acompanante::class, 'acompanante_id', 'id');
    }

    public function hospedaje()
    {
        return $this->belongsTo(\App\Models\Hospedaje::class, 'hospedaje_id', 'id');
    }
}
