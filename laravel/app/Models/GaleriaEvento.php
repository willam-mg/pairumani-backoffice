<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaEvento extends Model
{
    use HasFactory;

    protected $table = 'galeria_evento';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'evento_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'evento_id' => 'integer',
    ];


    public function evento()
    {
        return $this->belongsTo(\App\Models\Evento::class,'evento_id','id');
    }
}
