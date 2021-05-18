<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospedajeDetalleAcompanante extends Model
{
    use HasFactory;

    protected $table = 'hospedaje_detalle_acompanante';

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

    public function acompanante()
    {
        return $this->belongsTo(Acompanante::class, 'acompanante_id', 'id');
    }

    public function hospedaje()
    {
        return $this->belongsTo(Hospedaje::class);
    }
}
