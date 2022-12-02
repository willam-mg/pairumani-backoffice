<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CafeteriaProductoTamano extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cafeteria_producto_tamano';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'precio',
        'cafeteria_producto_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
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
