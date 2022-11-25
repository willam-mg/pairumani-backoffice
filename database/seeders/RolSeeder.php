<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
            'descripcion' => 'Puede modificar todos los modulos del sistema',
            'permisos' => '{"roles_index":"true","roles_create":"true","roles_edit":"true","roles_destroy":"true","roles_reporte":"true","roles_permisos":"true","usuarios_index":"true","usuarios_create":"true","usuarios_edit":"true","usuarios_destroy":"true","usuarios_reporte":"true","usuarios_show":"true","clientes_index":"true","clientes_create":"true","clientes_show":"true","clientes_edit":"true","clientes_destroy":"true","acompanantes_index":"true","acompanantes_create":"true","acompanantes_show":"true","acompanantes_edit":"true","acompanantes_destroy":"true","eventos_index":"true","eventos_create":"true","eventos_show":"true","eventos_edit":"true","eventos_destroy":"true","eventos_galeria":"true","eventos_galeria_destroy":"true","habitacioncategorias_index":"true","habitacioncategorias_create":"true","habitacioncategorias_show":"true","habitacioncategorias_edit":"true","habitacioncategorias_destroy":"true","habitaciones_index":"true","habitaciones_create":"true","habitaciones_show":"true","habitaciones_edit":"true","habitaciones_destroy":"true","habitaciones_galeria":"true","habitaciones_galeria_destroy":"true","reservas_index":"true","reservas_create":"true","reservas_show":"true","reservas_edit":"true","reservas_destroy":"true","reservas_hospedaje":"true","habitacionfrigobar_index":"true","habitacionfrigobar_create":"true","habitacionfrigobar_show":"true","habitacionfrigobar_edit":"true","habitacionfrigobar_destroy":"true","hospedajes_index":"true","hospedajes_create":"true","hospedajes_show":"true","hospedajes_edit":"true","hospedajes_destroy":"true","hospedajes_transporte":"true","hospedajes_transporte_destroy":"true","hospedajes_reserva_lugar":"true","hospedajes_reserva_productos":"true","hospedajes_reserva_cafeteria_productos":"true","hospedajes_frigobar":"true","restaurantecategorias_index":"true","restaurantecategorias_create":"true","restaurantecategorias_show":"true","restaurantecategorias_edit":"true","restaurantecategorias_destroy":"true","productos_index":"true","productos_create":"true","productos_show":"true","productos_edit":"true","productos_destroy":"true","productos_galeria":"true","productos_galeria_destroy":"true","opciones_index":"true","opciones_create":"true","opciones_show":"true","opciones_edit":"true","opciones_destroy":"true","tamanos_index":"true","tamanos_create":"true","tamanos_show":"true","tamanos_edit":"true","tamanos_destroy":"true","restaurantes_index":"true","restaurantes_create":"true","restaurantes_show":"true","restaurantes_reporte":"true","restaurantes_destroy":"true","cafeteriacategorias_index":"true","cafeteriacategorias_create":"true","cafeteriacategorias_show":"true","cafeteriacategorias_edit":"true","cafeteriacategorias_destroy":"true","cafeteria_productos_index":"true","cafeteria_productos_create":"true","cafeteria_productos_show":"true","cafeteria_productos_edit":"true","cafeteria_productos_destroy":"true","cafeteria_productos_galeria":"true","cafeteria_productos_galeria_destroy":"true","cafeteria_opciones_index":"true","cafeteria_opciones_create":"true","cafeteria_opciones_show":"true","cafeteria_opciones_edit":"true","cafeteria_opciones_destroy":"true","cafeteria_tamanos_index":"true","cafeteria_tamanos_create":"true","cafeteria_tamanos_show":"true","cafeteria_tamanos_edit":"true","cafeteria_tamanos_destroy":"true","cafeteria_index":"true","cafeteria_create":"true","cafeteria_show":"true","cafeteria_reporte":"true","cafeteria_destroy":"true","promociones_index":"true","promociones_create":"true","promociones_show":"true","promociones_edit":"true","promociones_destroy":"true","promocionreservas_index":"true","promocionreservas_create":"true","promocionreservas_show":"true","promocionreservas_edit":"true","promocionreservas_destroy":"true","lugaresturisticos_index":"true","lugaresturisticos_create":"true","lugaresturisticos_show":"true","lugaresturisticos_edit":"true","lugaresturisticos_destroy":"true","lugaresturisticos_galeria":"true","lugaresturisticos_galeria_destroy":"true","reservaslugaresturisticos_index":"true","reservaslugaresturisticos_create":"true","reservaslugaresturisticos_show":"true","reservaslugaresturisticos_edit":"true","reservaslugaresturisticos_destroy":"true","reservaslugaresturisticos_hospedaje":"true","transportes_index":"true","transportes_create":"true","transportes_show":"true","transportes_edit":"true","transportes_destroy":"true","hotel_galeria":"true","hotel_galeria_destroy":"true","reporte_ingresos_hospedajes":"true","reporte_ingresos_restaurante":"true","reporte_ingresos_lugaresturisticos":"true","reporte_ingresos_transportes":"true"}',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'prueba',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut',
            'permisos' => '{}',
        ]);
    }
}
