<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaLugarTuristico extends Model
{
    use HasFactory;

    const TIPO = 'lugar';

    protected $table = 'reservas_lugares_turisticos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'fecha',
        'lugar_turistico_id',
        'estado',
        'hospedaje_id',
        'precio',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        // 'fecha' => 'date',
        'lugar_turistico_id' => 'integer',
        'hospedaje_id' => 'integer',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function lugarturistico()
    {
        return $this->belongsTo(LugarTuristico::class, 'lugar_turistico_id', 'id');
    }

    public function hospedaje()
    {
        return $this->belongsTo(Hospedaje::class, 'hospedaje_id', 'id');
    }
}
