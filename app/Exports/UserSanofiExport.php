<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class UserSanofiExport implements FromCollection, WithHeadings, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = DB::table('users')->where('is_sanofi','1')->select(array('id','name', 'email', 'menuroles', 'is_sanofi'))->get();
        return $users;
    }

    public function headings(): array {
        return [
            'id',
            'Nombre',
            'Correo electrónico',
            'Roles Menú'
        ];
    }     
}
