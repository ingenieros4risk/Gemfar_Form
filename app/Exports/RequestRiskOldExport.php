<?php

namespace App\Exports;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Sanofi\SanofiRequestRiskOld;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class RequestRiskOldExport implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SanofiRequestRiskOld::all();
    }

    public function headings(): array {
		return [
			'ID',
            'Email Solicitante',
            'Nombre del Proveedor',
            'Correo del Proveedor',
            'Teléfono del Proveedor',
            'Adjunto',
            'Orden de Compra',
            'Número de orden',
            'MIGO',
            'GR',
            'Observación',
            'Nombre del Solicitante',
            'País de Homologación',
            'Sociedad Solicitante',
            'Estado',
            'Tipo de Proveedor',
            'Tipo de Solicitud',
            'Fecha de solicitud',
            'Fecha de finalización',
            'HACAT',
            'Due Diligence',
            'Área Solicitante',
            'Nombre del Comprador',
            'Condición de Pago',
            'Nacionalidad'
        ];
	}

}
