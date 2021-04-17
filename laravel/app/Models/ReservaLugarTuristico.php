<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaLugarTuristico extends Model
{
    use HasFactory;

    protected $table = 'reservas_lugares_turisticos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'fecha',
        'lugar_turistico_id',
        'estado',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'fecha' => 'date',
        'lugar_turistico_id' => 'integer',
    ];


    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class,'cliente_id','id');
    }

    public function lugarTuristico()
    {
        return $this->belongsTo(\App\Models\LugarTuristico::class,'lugar_turistico_id','id');
    }
}
