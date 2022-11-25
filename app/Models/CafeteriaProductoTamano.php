<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeteriaProductoTamano extends Model
{
    use HasFactory;

    protected $table = 'cafeteria_producto_tamano';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'precio',
        'cafeteria_producto_id',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cafeteria_producto_id' => 'integer',
    ];

    public function producto()
    {
        return $this->belongsTo(CafeteriaProducto::class, 'cafeteria_producto_id', 'id');
    }
}
