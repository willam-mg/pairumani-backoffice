<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospedajeDetalleFrigobar extends Model
{
    use HasFactory;

    protected $table = 'hospedaje_detalle_frigobar';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'hospedaje_id',
        'nombre',
        'precio',
        'cantidad',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'hospedaje_id' => 'integer',
    ];

    public function hospedaje()
    {
        return $this->belongsTo(Hospedaje::class, 'hospedaje_id', 'id');
    }
}
