<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pengaduan;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index() {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        $menu = Auth::user()->roles->pluck('name');
        return view ('admin.auth.index', [
            'menu' => $menu,
            'users' => $users,
        ]);
    }
    public function detail($id) {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        $user = User::find($id);
        // $tanggapan = DB::table('tanggapans')
        // ->join('users', 'users.id', '=', 'tanggapans.user_id')
        // ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        // ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        // ->where('pengaduan_id', $id)
        // ->get();

        return view('admin.auth.detail', [
            'menu' => $menu,
            'user' => $user,
            'pengaduan' => $pengaduan
        ]);
    }
    public function pdf_export($id) {
        $user = User::find($id);
        $data = ['judul' => 'ini judul'];
        $pdf = PDF::loadView('admin/auth/pdf',[
            'user' => $user,
            'data' => $data
        ]);
        return $pdf->download($user->name . date(' MY'). '.pdf');
    }
}
