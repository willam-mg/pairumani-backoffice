<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaLugaresTuristicos extends Model
{
    use HasFactory;

    protected $table = 'galeria_lugares_turisticos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'descripcion',
        'lugar_turistico_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'lugar_turistico_id' => 'integer',
    ];

    public function lugarTuristico()
    {
        return $this->belongsTo(\App\Models\LugarTuristico::class, 'lugar_turistico_id','id');
    }
}
