<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $user = Auth::user()->roles->pluck('name');
        return view('admin.dashboard.index',compact('user'));
    }
}
