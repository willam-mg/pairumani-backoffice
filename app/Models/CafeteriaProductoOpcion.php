<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeteriaProductoOpcion extends Model
{
    use HasFactory;

    protected $table = 'cafeteria_producto_opciones';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'precio',
        'cafeteria_producto_id',
        'precio',
        'foto',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cafeteria_producto_id' => 'integer',
    ];


    public function producto()
    {
        return $this->belongsTo(CafeteriaProducto::class,'cafeteria_producto_id','id');
    }
}
