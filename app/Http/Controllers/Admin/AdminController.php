<?php

namespace App\Http\Controllers\Admin;

use App\Desa;
use App\Exports\UserExport;
use App\Exports\PengaduanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateProfileRequest;
use App\User;
use App\Pengaduan;
use App\Tanggapan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        $menu = Auth::user()->roles->pluck('name');
        $users = User::orderBy('id', 'ASC')->paginate(10);
        $nonaktif = User::onlyTrashed()->orderBy('id', 'ASC')->paginate(10);
        return view ('admin.auth.index', [
            'menu' => $menu,
            'users' => $users,
            'nonaktif' => $nonaktif,
        ]);
    }

    public function profile() {
        $menu = Auth::user()->roles->pluck('name');
        $user = Auth::user();
        return view ('admin.profile.index', [
            'menu' => $menu,
            'user' => $user
        ]);
    }

    public function update(UpdateProfileRequest $request) {
        $request->user()->update(
            $request->all()
        );
        return redirect()->back()->with('status', 'Data berhasil diupdate');
    }

    public function search(Request $request)
    {           
        $menu = Auth::user()->roles->pluck('name');
        $search = $request->search;
        $users = User::where('name','like',"%".$search."%")->paginate(50);
        $nonaktif = User::onlyTrashed()->orderBy('id', 'ASC')->paginate(10);
        return view('admin.auth.index', [
            'users' => $users,
            'menu' => $menu,
            'nonaktif' => $nonaktif
        ]);
    }

    public function time_line() {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::orderBy('id', 'ASC')->paginate(50);
        // Alternative
        // $pengaduan = Pengaduan::where('status', '!=' ,'reject')->paginate(50);
        return view('admin.timeline.index', [
            'menu' => $menu,
            'pengaduan' => $pengaduan
        ]);
    }

    public function detail($id) 
    {
    $menu = Auth::user()->roles->pluck('name');
    $pengaduan = Pengaduan::find($id);
    $user = User::find($id);
    return view('admin.auth.detail', [
        'menu' => $menu,
        'user' => $user,
        'pengaduan' => $pengaduan
        ]);
    }
        
    public function nonaktif($id)
    {
        User::destroy($id);
        return redirect('admin/data-user')->with('status', 'User berhasil dinonaktifkan!');
    }
    public function aktifkan($id)
    {
        // 
        $user = User::onlyTrashed()->where('id',$id);
        $user->restore();
        return redirect()->back()->with('status', 'User berhasil diaktifkan!');
    }
    
    public function user_excel() 
    {
        return Excel::download(new UserExport, 'user-report.xlsx');
    }

    public function pengaduan_excel() 
    {
        return Excel::download(new PengaduanExport, 'pengaduan-report.xlsx');
    }

    public function tanggapan($id) 
    {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        $user = Auth::user();
        $tanggapan = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();
        return view('admin.auth.detail-aduan', [
            'menu' => $menu,
            'pengaduan' => $pengaduan,
            'user' => $user,
            'tanggapan' => $tanggapan
        ]);
    }

    public function detail_aduan($id) 
    {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        $user = Auth::user();
        $tanggapan = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();
        return view('admin.auth.detail-aduan', [
            'menu' => $menu,
            'pengaduan' => $pengaduan,
            'user' => $user,
            'tanggapan' => $tanggapan
        ]);
    }

    public function kirim_tanggapan(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'isi_tanggapan' => 'required',
            'pengaduan_id' => 'required',
            'status' => 'required'
        ], [
            'isi_tanggapan.required' => 'wajib diisi',
            'status.required' => 'wajid diisi!',
        ]);

        
        // Simpan data
        Tanggapan::create([
            'user_id' => Auth::id(),
            'tgl_tanggapan' => Carbon::now(),
            'isi_tanggapan' => $request->isi_tanggapan,
            'pengaduan_id' => $request->pengaduan_id,
        ]);

        $update = $pengaduan->find($request->pengaduan_id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function petugas()
    {
        $menu = Auth::user()->roles->pluck('name');

        $petugas = User::whereHas("roles", function($q)
        { 
            $q->where("name", "petugas"); 
        })->paginate(50);

        $admin = User::whereHas("roles", function($q)
        { 
            $q->where("name", "admin"); 
        })->paginate(50);
        // $petugas = User::orderBy('id', 'ASC')->paginate(50);
        return view('admin.auth.data-petugas', [
            'petugas' => $petugas,
            'admin' => $admin,
            'menu' => $menu
        ]);
    }

    public function petugas_tambah(request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits_between:11,13'],
            'nik' => ['required', 'digits:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ], [
            'name.required' => 'Nama harus diisi!',
            'phone.required' => 'Nomor telpon harus diisi!',
            'phone.digits_between' => 'Nomor telpon maksimal 13 karakter!',
            'nik.required' => 'Nik harus diisi!',
            'nik.digits' => 'Nik maksimal 16 karakter!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email harus berupa email!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Password tidak sama!',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'phone' => $request->phone,
            'nik' => $request->nik,
            'password' => Hash::make($request['password']),
            ]);
        $role = $request->role;
        $user->assignRole($role);
        return redirect('admin/petugas')->with('status', 'Data pengaduan berhasil ditambah!');
    }

    public function pengaduan()
    {
        $menu = Auth::user()->roles->pluck('name');
        $desa = Desa::all();
        $pengaduan = Pengaduan::orderBy('id', 'ASC')->paginate(10);
        return view('admin.auth.data-pengaduan', [
            'menu' => $menu,
            'pengaduan' => $pengaduan,
            'desa' => $desa
        ]);
    }

    public function cetak_aduan_pertanggal($tglAwal, $tglAkhir) 
    {
        $pengaduan = Pengaduan::with('users')->whereBetween('tgl_pengaduan',[$tglAwal , $tglAkhir])->get();
        $tglAwal = $tglAwal;
        $tglAkhir = $tglAkhir;
        return view('admin.auth.report-pengaduan', [
            'pengaduan' => $pengaduan,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir,
        ]);
    }

    public function cetak_aduan_lokasi($lokasi) 
    {
        $pengaduan = Pengaduan::with('users')->where('lokasi',[$lokasi])->get();
        $lokasi = $lokasi;
        return view('admin.auth.report-pengaduan-lokasi', [
            'pengaduan' => $pengaduan,
            'lokasi' => $lokasi,
        ]);
    }
    
}
