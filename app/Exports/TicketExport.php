<?php

namespace App\Exports;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Client;
use App\Models\Ticket\TicketType;
use App\Models\Ticket\TicketStatus;
use App\Models\Ticket\TicketMedium;
use App\Models\Ticket\TicketPlatform;
use App\Models\Ticket\TicketPlatformMenu;
use App\Models\Ticket\TicketPlatformSubmenu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Auth;

class TicketExport implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tickets = Ticket::all(); 
        foreach ($tickets as $ticket) {
            $reporta = User::find($ticket->id_analista);
            $cliente = Client::find($ticket->id_cliente);
            $tipo = TicketType::find($ticket->id_tipo);
            $user_ti = User::find($ticket->id_ti);
            $medio = TicketMedium::find($ticket->id_medio);
            $estado = TicketStatus::find($ticket->id_estado);
            $plataforma = TicketPlatform::find($ticket->id_platform);
            $menu = TicketPlatformMenu::find($ticket->id_menu);
            $submenu = TicketPlatformSubmenu::find($ticket->id_submenu);

            $ticket->id_analista = $reporta->name;
            $ticket->id_cliente = $cliente->name;
            $ticket->id_tipo = $tipo->name;
            $ticket->id_ti = $user_ti->name;
            $ticket->id_medio = $medio->name;
            $ticket->id_estado = $estado->name;
            $ticket->id_platform = $plataforma->name;
            $ticket->id_menu = $menu->name;
            $ticket->id_submenu = $submenu->name;

        }
        return $tickets;
    }

    public function headings(): array {
        return [
            'id',
            'Tipo',
            'Analista Reporta',
            'Analista Responsable',
            'Cliente',
            'Medio',
            'Estado',
            'Menu',
            'SubMenu',
            'Plataforma',
            'Funcionario',
            'Correo',
            'Hora Solicitud',
            'telefono contacto',
            'procedimiento',
            'Usuario Inspektor',
            'Observación',
            'Solución',
            'Criticidad',
            'URL Requerimiento',
            'URL Respuesta',
            'Fecha Solicitud',
            'Fecha Solución',
            'SubProceso'
        ];
    }  
}
