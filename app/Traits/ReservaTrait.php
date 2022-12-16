<?php

namespace App\Traits;

use Carbon\Carbon;

class ReservaTrait
{
    /**
     * Precio de reserva
     * Calcula el precio final o total de la reserva.
     * @param date $fechaInicio
     * @param date $fechaFin
     * @param double $precio
     * @return double Precio final
     */
    public function precioReserva($fechaInicio, $fechaFin, $precio) {
        $dateStart = Carbon::parse($fechaInicio);
        $dateEnd = Carbon::parse($fechaFin);
        $numDias = $dateStart->diffInDays($dateEnd) + 1;
        return $precio * $numDias;
    }
}

