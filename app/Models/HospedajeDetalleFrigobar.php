<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HospedajeDetalleFrigobar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hospedaje_detalle_frigobar';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'hospedaje_id',
        'nombre',
        'precio',
        'cantidad',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
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
