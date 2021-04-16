<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    use HasFactory;

    protected $table = 'acompanhantes';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'tipo_documento',
        'nacionalidad',
        'fecha_nacimiento',
        'ciudad',
    ];

    protected $guarded = [];

    public function hospedajedetalle()
    {
        return $this->belongsTo(HospedajeDetalle::class, 'acompanante_id', 'id');
    }
}
