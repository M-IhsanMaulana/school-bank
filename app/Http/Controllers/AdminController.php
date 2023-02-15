<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Rekening;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //Get Tampilan
    public function dataUser()
    {
        $data = User::all();
        return view('admin.data-user', compact('data'));
    }

    public function dataKelas()
    {
        $data = Kelas::all();
        return view('admin.data-kelas', compact('data'));
    }

    public function dataRekening()
    {
        $data = Rekening::with(['user', 'kelas'])->get();
        return view('admin.data-rekening', compact('data'));
    }

    public function dataTransaksi()
    {
        $data = Transaksi::all();
        return view('admin.data-transaksi', compact('data'));
    }

    public function transaksiView()
    {
        $data = Rekening::with(['user', 'kelas'])->get();
        return view('admin.transaksi', compact('data'));
    }

    public function createKelas(Request $request)
    {
        $this->validate($request, ['name' => ['required']]);

        $kelas = Kelas::create(
            [ 'name' => $request->name ]
        );
        $kelas->save();

        return redirect()->route('admin.data-kelas')->with('success', 'Berhasil menambahkan kelas '. $request->name);
    }

    public function deleteKelas($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('admin.data-kelas')->with('success', 'Berhasil menghapus kelas dengan id'. $id);
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'min:7'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $user->save();

        return redirect()->route('admin.data-user')->with('success', 'Berhasil Menambahkan data');
    }

}
