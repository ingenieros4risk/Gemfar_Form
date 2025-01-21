<?php

namespace App\Exports;

use App\Models\User;
use App\Models\User\UserStatus;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class UsersExport implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::all();
        
        foreach ($users as $user) {
            $obj_status_id = UserStatus::find($user->status_id);

            $user->status_id = $obj_status_id->name;
            $user->is_sanofi = ($user->is_sanofi > 0 ? "SI" : "NO");
        }
        return $users;
    }

    public function headings(): array {
        return [
            'id',
            'Nombre',
            'Imagen perfil',
            'Cargo',
            'Correo electrónico',
            'emai verify',
            'Roles Menú',
            'Estado',
            'Sanofi'
        ];
    } 
}
