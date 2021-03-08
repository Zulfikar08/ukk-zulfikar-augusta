<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    //
    protected $fillable = [
        'pengaduan_id', 'tgl_tanggapan', 'isi_tanggapan', 'user_id',
    ];
}
