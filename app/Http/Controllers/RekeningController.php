<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function createStepone(Request $request)
    {
        $rekening = $request->session()->get('rekening');

        return view('users.buat-rek-1',compact('rekening'));
    }

    public function postCreateStepOne(Request $request)
    {
        $validatedata = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nik' => 'required|numeric',
            'alamat' => 'required',
        ]);

        if (empty($request->session()->get('rekening'))) {
            $rekening = new Rekening();
            $rekening->user_id = Auth()->user()->id;
            $rekening->fill($validatedata);
            $request->session()->put('rekening', $rekening);
        } else {
            $rekening = $request->session()->get('rekening');
            $rekening->user_id = Auth()->user()->id;
            $rekening->fill($validatedata);
            $request->session()->put('rekening', $rekening);
        }

        return redirect()->route('user.create-step-2');
    }

    public function createSteptwo(Request $request)
    {
        $rekening = $request->session()->get('rekening');
        $kelas = Kelas::all();
        //dd($rekening);
        return view('users.buat-rek-2',compact('rekening', 'kelas'));
    }

    public function postCreateStepTwo(Request $request)
    {
        $validatedata = $request->validate([
            'kelas_id' => 'required',
            'nomor_induk' => 'required',
        ]);

        $no_rek = rand(000000000, 4244123231);
        $pin = rand(000000, 999999);
        $rekening = $request->session()->get('rekening');
        $rekening->no_rekening = $no_rek;
        $rekening->pin = $pin;
        $rekening->fill($validatedata);
        $request->session()->put('rekening', $rekening);

        return redirect()->route('user.create-confirmation');
    }

    public function createStepconfirmation(Request $request)
    {
        $rekening = $request->session()->get('rekening');
        return view('users.buat-rek-confirm', compact('rekening'));
    }

    public function postcreateRekening(Request $request)
    {
        $rekening = $request->session()->get('rekening');
        $rekening->save();

        $request->session()->forget('rekening');
        return redirect()->route('user.my-rek')->with('message', 'Rekening anda berhasil di buat silahkan tunggu untuk aktivasi admin');
    }
}
