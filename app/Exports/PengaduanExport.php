<?php

namespace App\Exports;

use App\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengaduanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Tgl Pengaduan',
            'Judul Aduan',
            'Isi Aduan',
            'Direktori File',
            'Status',
            'Id User',
        ];
    }
    public function collection()
    {
        return Pengaduan::get(['id', 'tgl_pengaduan', 'judul_laporan', 'isi_laporan', 'file', 'status', 'user_id']);
    }
}
