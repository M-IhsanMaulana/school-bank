<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Rekening;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $id = Auth()->user()->id;
        $rekening = Rekening::where('user_id', $id)->get();
        return view('users.dashboard', compact('rekening'));
    }

    public function adminHome()
    {
        $user = User::all();
        $kelas = Kelas::all();
        $rekening = Rekening::all();
        $transaksi = Transaksi::all();
        return view('admin.dashboard', compact('user', 'kelas', 'rekening', 'transaksi'));
    }
}
