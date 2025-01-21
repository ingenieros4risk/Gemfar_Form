<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketPlatformSubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cambiar contraseña', 'id_ticket_menu' => 1]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Agregar usuario', 'id_ticket_menu' => 2]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar usuario', 'id_ticket_menu' => 2]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar tipo tercero', 'id_ticket_menu' => 2]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar tipos de lista por consulta', 'id_ticket_menu' => 2]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar procuraduría', 'id_ticket_menu' => 2]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Logo empresa', 'id_ticket_menu' => 2]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Configuración notificaciones', 'id_ticket_menu' => 3]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Notificaciones enviada', 'id_ticket_menu' => 3]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consulta Individual', 'id_ticket_menu' => 4]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consulta masiva', 'id_ticket_menu' => 4]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Tipo listas propias', 'id_ticket_menu' => 5]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cargar listas propias', 'id_ticket_menu' => 5]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Gestionar listas propias', 'id_ticket_menu' => 5]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consulta reporte', 'id_ticket_menu' => 6]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar log', 'id_ticket_menu' => 6]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reporte de consultas y coincidencias', 'id_ticket_menu' => 6]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reporte detallado de coincidencias', 'id_ticket_menu' => 6]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reporte consultas por tipo de tercero', 'id_ticket_menu' => 6]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ver consultas realizadas', 'id_ticket_menu' => 6]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Certificación actualización listas', 'id_ticket_menu' => 6]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Parametrizar perfiles', 'id_ticket_menu' => 7]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Parametrizar variables y categorías', 'id_ticket_menu' => 7]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cargue archivo perfilamiento', 'id_ticket_menu' => 7]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ver perfilamiento', 'id_ticket_menu' => 7]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Noticias', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'FAQ', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Señales de alerta', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Registrar ROI/Denuncia', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'E-Learning', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Nuestra Oferta E-Learning 2021', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Solicitar DDA', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Mapas indicadores de Riesgo', 'id_ticket_menu' => 8]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Otros', 'id_ticket_menu' => 9]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cambiar contraseña', 'id_ticket_menu' => 10]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Agregar Empresa / Usuario', 'id_ticket_menu' => 11]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar Planes', 'id_ticket_menu' => 11]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar Procuraduría', 'id_ticket_menu' => 11]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar Entidades', 'id_ticket_menu' => 11]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar Servicios Adicionales', 'id_ticket_menu' => 11]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar Listas PEPs', 'id_ticket_menu' => 11]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Nombres y Documentos', 'id_ticket_menu' => 11]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Tipos de Listas', 'id_ticket_menu' => 12]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar Listas', 'id_ticket_menu' => 12]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Exportar Bases', 'id_ticket_menu' => 12]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Estadisticas Listas', 'id_ticket_menu' => 12]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar Reporte', 'id_ticket_menu' => 13]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Histórico Reporte', 'id_ticket_menu' => 13]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reportes Cifras', 'id_ticket_menu' => 13]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar Log', 'id_ticket_menu' => 14]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ver Consultas Realizadas', 'id_ticket_menu' => 15]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar Contenidos', 'id_ticket_menu' => 16]);
        /*Inspektor Perú*/
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cambiar contraseña', 'id_ticket_menu' => 17]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Agregar usuario', 'id_ticket_menu' => 18]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar usuario', 'id_ticket_menu' => 18]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar tipo tercero', 'id_ticket_menu' => 18]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar tipos de lista por consulta', 'id_ticket_menu' => 18]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Administrar procuraduría', 'id_ticket_menu' => 18]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Logo empresa', 'id_ticket_menu' => 18]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Configuración notificaciones', 'id_ticket_menu' => 19]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Notificaciones enviada', 'id_ticket_menu' => 19]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consulta Individual', 'id_ticket_menu' => 20]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consulta masiva', 'id_ticket_menu' => 20]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Tipo listas propias', 'id_ticket_menu' => 21]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cargar listas propias', 'id_ticket_menu' => 21]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Gestionar listas propias', 'id_ticket_menu' => 21]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consulta reporte', 'id_ticket_menu' => 22]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar log', 'id_ticket_menu' => 22]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reporte de consultas y coincidencias', 'id_ticket_menu' => 22]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reporte detallado de coincidencias', 'id_ticket_menu' => 22]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reporte consultas por tipo de tercero', 'id_ticket_menu' => 22]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ver consultas realizadas', 'id_ticket_menu' => 22]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Certificación actualización listas', 'id_ticket_menu' => 22]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Parametrizar perfiles', 'id_ticket_menu' => 23]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Parametrizar variables y categorías', 'id_ticket_menu' => 23]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cargue archivo perfilamiento', 'id_ticket_menu' => 23]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ver perfilamiento', 'id_ticket_menu' => 23]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Noticias', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'FAQ', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Señales de alerta', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Registrar ROI/Denuncia', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'E-Learning', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Nuestra Oferta E-Learning 2021', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Solicitar DDA', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Mapas indicadores de Riesgo', 'id_ticket_menu' => 24]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Otro', 'id_ticket_menu' => 25]);
        /*DATALAFT*/
        DB::table('ticket_platform_submenus')->insert(['name' => 'Dashboard/Inicio', 'id_ticket_menu' => 26]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ingresar Actividad', 'id_ticket_menu' => 27]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Actividades', 'id_ticket_menu' => 27]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitor de Actividades', 'id_ticket_menu' => 27]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Fuentes', 'id_ticket_menu' => 28]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Fuentes', 'id_ticket_menu' => 28]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitoreo de Fuentes de Fuentes', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Noticias', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Noticias Pendientes', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitorear y Gestionar', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Buscar Noticia/Tercero', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitorear y Gestionar', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitor de Noticias', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'NOTIRISK', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Noticias', 'id_ticket_menu' => 29]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de DDA', 'id_ticket_menu' => 30]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Seguimiento DDA', 'id_ticket_menu' => 30]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Resumen DDA', 'id_ticket_menu' => 30]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Terceros Solicitados', 'id_ticket_menu' => 30]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades DDA', 'id_ticket_menu' => 30]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Bases', 'id_ticket_menu' => 31]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Actualización de Bases', 'id_ticket_menu' => 31]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitor de Bases', 'id_ticket_menu' => 31]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Bases', 'id_ticket_menu' => 31]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Bitacora de Soporte', 'id_ticket_menu' => 32]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Actualizar Bitacora', 'id_ticket_menu' => 32]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitor Soporte', 'id_ticket_menu' => 32]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Soporte', 'id_ticket_menu' => 32]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Tickets', 'id_ticket_menu' => 33]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitor Tickets', 'id_ticket_menu' => 33]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ingresar Ticket', 'id_ticket_menu' => 33]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Ticket', 'id_ticket_menu' => 33]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Reporte de Errores', 'id_ticket_menu' => 34]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitor de Errores', 'id_ticket_menu' => 34]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Calidad', 'id_ticket_menu' => 34]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Clientes', 'id_ticket_menu' => 35]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Clientes', 'id_ticket_menu' => 35]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Usuarios', 'id_ticket_menu' => 36]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Registrar Usuario', 'id_ticket_menu' => 36]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Editar Rol', 'id_ticket_menu' => 36]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Festivos', 'id_ticket_menu' => 36]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Inspektor WS', 'id_ticket_menu' => 37]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Listas de Inspektor', 'id_ticket_menu' => 37]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Consultas', 'id_ticket_menu' => 37]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Parametrización', 'id_ticket_menu' => 37]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades de Inspektor', 'id_ticket_menu' => 37]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Solicitudes', 'id_ticket_menu' => 38]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Actualizaciones', 'id_ticket_menu' => 38]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de información de Proveedores', 'id_ticket_menu' => 38]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Monitor de Solicitudes', 'id_ticket_menu' => 38]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Lista de Usuarios', 'id_ticket_menu' => 38]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Propiedades Formulario Sanofi', 'id_ticket_menu' => 39]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Mapas de Riesgo', 'id_ticket_menu' => 40]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Formulario Solicitar DDA', 'id_ticket_menu' => 41]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Dashboard', 'id_ticket_menu' => 42]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cambio Contraseña', 'id_ticket_menu' => 43]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Areas', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cargos', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cadena de Valor', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Macroprocesos', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Proceso', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Subproceso', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Notificaciones', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Otros Tipos', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Jerarquía Organizacional', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Ubicación Geográfica', 'id_ticket_menu' => 44]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Roles', 'id_ticket_menu' => 45]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Agregar Usuario', 'id_ticket_menu' => 45]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Consultar Usuario', 'id_ticket_menu' => 45]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Parametrización', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Legislzación', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Riesgos', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Anulación del Riesgo', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Planes de Acción', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Registro de Controles', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Eventos', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Mapas de Riesgo', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reporte', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Histórico Riesgos', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Carga Masiva', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Indicadores', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Cuadro de Mando', 'id_ticket_menu' => 46]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Parametrización General', 'id_ticket_menu' => 47]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Señales de Alerta', 'id_ticket_menu' => 47]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Instrumentos SARLAFT', 'id_ticket_menu' => 47]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Conocimiento de cliente', 'id_ticket_menu' => 47]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Reportes', 'id_ticket_menu' => 47]);
        DB::table('ticket_platform_submenus')->insert(['name' => 'Otros', 'id_ticket_menu' => 48]);


    }
}

