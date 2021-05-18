<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    use HasFactory;

    protected $table = 'acompanhantes';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'tipo_documento',
        'num_documento',
        'nacionalidad',
        'fecha_nacimiento',
        'ciudad'
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];
}
