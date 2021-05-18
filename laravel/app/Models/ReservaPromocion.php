<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaPromocion extends Model
{
    use HasFactory;

    const TIPO = 'promocion';

    protected $table = 'reservas_promocion';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'promocion_id',
        'habitacion_id',
        'cliente_id',
        'checkin',
        'checkout',
        'adultos',
        'niños',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'promocion_id' => 'integer',
        'habitacion_id' => 'integer',
        'cliente_id' => 'integer',
        // 'checkin' => 'date',
        // 'checkout' => 'date',
    ];


    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'promocion_id', 'id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }
}
