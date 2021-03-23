<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Nama',
            'Nik',
            'Email',
            'Email Verifikasi',
            'No Telp',
            'Tanggal didaftar',
        ];
    }
    public function collection()
    {
        return User::get(['id', 'name', 'nik', 'email', 'email_verified_at', 'phone', 'created_at']);
    }
}
