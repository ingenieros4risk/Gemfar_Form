<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportTypificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('support_typifications')->insert(['name' => 'Consultas masivas represadas']);
		DB::table('support_typifications')->insert(['name' => 'Consulta lenta/Consulta Individual Represada']);
		DB::table('support_typifications')->insert(['name' => 'Falla interna Rama']);
		DB::table('support_typifications')->insert(['name' => 'Falla interna PGN']);
		DB::table('support_typifications')->insert(['name' => 'Falla fuente Rama']);
		DB::table('support_typifications')->insert(['name' => 'Falla fuente PGN']);
		DB::table('support_typifications')->insert(['name' => 'Falla interna + servicios']);
		DB::table('support_typifications')->insert(['name' => 'Falla fuente + servicios']);
		DB::table('support_typifications')->insert(['name' => 'Falla generar reporte']);
		DB::table('support_typifications')->insert(['name' => 'Falla reporte + servicios']);
		DB::table('support_typifications')->insert(['name' => 'Falla interna conozca el nombre o razón social']);
		DB::table('support_typifications')->insert(['name' => 'Falla fuente conozca el nombre o razón social']);
		DB::table('support_typifications')->insert(['name' => 'Notificaciones coincidencias no enviadas']);
		DB::table('support_typifications')->insert(['name' => 'Notificaciones contraseña no enviadas']);
		DB::table('support_typifications')->insert(['name' => 'Contraseña automática no funciona']);
		DB::table('support_typifications')->insert(['name' => 'Consultas contrato especial']);
		DB::table('support_typifications')->insert(['name' => 'Asignación DDA']);
		DB::table('support_typifications')->insert(['name' => 'DDA Simplificada']);
		DB::table('support_typifications')->insert(['name' => 'Inquietud DDA pendientes']);
		DB::table('support_typifications')->insert(['name' => 'Inquietud en coincidencias']);
		DB::table('support_typifications')->insert(['name' => 'Solicita consulta antigua']);
		DB::table('support_typifications')->insert(['name' => 'Usuario administrador bloqueado']);
		DB::table('support_typifications')->insert(['name' => 'Usuario consultor bloqueado']);
		DB::table('support_typifications')->insert(['name' => 'Usuario Informador bloqueado']);
		DB::table('support_typifications')->insert(['name' => 'Restablecer contraseña']);
		DB::table('support_typifications')->insert(['name' => 'Captcha']);
		DB::table('support_typifications')->insert(['name' => 'Tercero desactualizado o sin registro']);
		DB::table('support_typifications')->insert(['name' => 'Fallas en Web Service']);
		DB::table('support_typifications')->insert(['name' => 'Inquietud funcional']);
		DB::table('support_typifications')->insert(['name' => 'Administrativo']);
		DB::table('support_typifications')->insert(['name' => 'Alerta de monitoreo']);
		DB::table('support_typifications')->insert(['name' => 'Boletines Datalaft e Informes']);
		DB::table('support_typifications')->insert(['name' => 'Capacitación']);
		DB::table('support_typifications')->insert(['name' => 'Reuniones']);
		DB::table('support_typifications')->insert(['name' => 'Nuevas listas Inspektor']);
		DB::table('support_typifications')->insert(['name' => 'Consultas masivas solicitadas a IT']);
		DB::table('support_typifications')->insert(['name' => 'E-Learning/Webinar']);
		DB::table('support_typifications')->insert(['name' => 'Comercial']);
		DB::table('support_typifications')->insert(['name' => 'Usuarios de prueba']);
		DB::table('support_typifications')->insert(['name' => 'Activación del servicio nuevo cliente']);
		DB::table('support_typifications')->insert(['name' => 'Notificaciones nuevo usuario no enviadas']);
		DB::table('support_typifications')->insert(['name' => 'Ingreso Nombres y Documentos']);
		DB::table('support_typifications')->insert(['name' => 'Solución falla/caída/inconsistencia/requerimiento']);
		DB::table('support_typifications')->insert(['name' => 'No es para DATALAFT']);
		DB::table('support_typifications')->insert(['name' => 'Falla consulta listas propias']);
		DB::table('support_typifications')->insert(['name' => 'Consultoría/SHERLOCK']);
		DB::table('support_typifications')->insert(['name' => 'Fallas por mejoras Inspektor']);
		DB::table('support_typifications')->insert(['name' => 'Derecho de Petición']);
		DB::table('support_typifications')->insert(['name' => 'Asesoría Jurídica']);
		DB::table('support_typifications')->insert(['name' => 'Falla interna consulta']);
		DB::table('support_typifications')->insert(['name' => 'Demo Inspektor']);
		DB::table('support_typifications')->insert(['name' => 'Demo Monitoreo de Medios']);
		DB::table('support_typifications')->insert(['name' => 'Revisión ambiente de pruebas Inspektor']);
		DB::table('support_typifications')->insert(['name' => 'PQRS/Felicitaciones']);
		DB::table('support_typifications')->insert(['name' => 'Falla en módulos que no son de consulta']);

    }
}
