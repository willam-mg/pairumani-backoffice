<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaHotel extends Model
{
    use HasFactory;

    protected $table = 'galeria_hotel';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'foto',
        'descripcion',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];
}
