<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pengaduan;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        $admin = DB::table('model_has_roles')->where('role_id', 1)->count();
        $masyarakat = DB::table('model_has_roles')->where('role_id', 3)->count();
        $pengaduan = Pengaduan::all()->count();         
        return view('welcome', [
            'pengaduan' => $pengaduan,
            'admin' => $admin,
            'masyarakat' => $masyarakat
        ]);
    }
}
