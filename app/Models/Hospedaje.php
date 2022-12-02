<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospedaje extends Model
{
    use HasFactory, SoftDeletes;

    const TIPO = 'hospedaje';

    protected $table = 'hospedajes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'cliente_id',
        'fecha_checkin',
        'fecha_checkout',
        'habitacion_id',
        'precio',
        'precio_promocion',
        'adultos',
        'niños',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        // 'fecha_checkin' => 'date',
        // 'fecha_checkout' => 'date',
        'habitacion_id' => 'integer',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class,'habitacion_id','id');
    }

    public function detalletransportes()
    {
        return $this->hasMany(HospedajeDetalleTransporte::class,'hospedaje_id','id');
    }

    public function detalleacompanantes()
    {
        return $this->hasMany(HospedajeDetalleAcompanante::class,'hospedaje_id','id');
    }

    public function detallefrigobars()
    {
        return $this->hasMany(HospedajeDetalleFrigobar::class,'hospedaje_id','id');
    }

    public function restaurantes()
    {
        return $this->hasMany(ReservaRestaurante::class,'hospedaje_id','id');
    }

    public function cafeterias()
    {
        return $this->hasMany(ReservaCafeteria::class,'hospedaje_id','id');
    }

    public function lugares()
    {
        return $this->hasMany(ReservaLugarTuristico::class,'hospedaje_id','id');
    }

    public function total()
    {
        $transporte = pageTotal($this->detalletransportes,'precio');
        $restaurante = pageTotal($this->restaurantes,'total');
        $cafeteria = pageTotal($this->cafeterias,'total');
        $lugares = pageTotal($this->lugares,'precio');
        $frigobar = $this->totalfrigobar();
        $suma = ($this->precio_promocion ? $this->precio_promocion : $this->precio) + $transporte + $restaurante + $lugares + $frigobar + $cafeteria;
        return $suma;
    }

    public function totalfrigobar()
    {
       $total = 0;
        foreach ($this->detallefrigobars as $frigobar) {
            $total += ($frigobar->precio * $frigobar->cantidad);
        }
        return $total;
    }
}
