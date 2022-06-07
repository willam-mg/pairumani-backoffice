<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabitacionFrigobar extends Model
{
    use HasFactory;

    protected $table = 'habitacion_frigobar';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'habitacion_id',
        'nombre',
        'precio',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'habitacion_id' => 'integer',
    ];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class,'habitacion_id','id');
    }
}
