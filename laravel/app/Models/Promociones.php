<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    use HasFactory;

    protected $table = 'promociones';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'precio',
        'estado',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function reservaspromociones()
    {
        return $this->hasMany(\App\Models\ReservaPromocion::class, 'promocion_id', 'id');
    }
}
