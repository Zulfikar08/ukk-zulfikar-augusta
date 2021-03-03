<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    //
    protected $table = "pengaduans";
    protected $fillable = [
        'id','tgl_pengaduan', 'judul_laporan', 'isi_laporan', 'file', 'status', 'user_id'
    ];
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
