<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TransaksiController extends Controller
{
    //Post and get data
    public function getDataRekening($rek)
    {
        $data = Rekening::where('no_rekening', $rek)->get();

        return response()->json($data);
    }

    public function setorTunai(Request $request)
    {
        $rekening = Rekening::where('no_rekening', $request->no_rek)->get();
        $kalkusaldo = $rekening[0]->total_saldo + $request->jumlah_setoran;
        //dd($kalkusaldo);
        $saldo = [
            "total_saldo" => $kalkusaldo,
        ];
        Rekening::where('no_rekening', $request->no_rek)->update($saldo);
        $transaksi = Transaksi::create([
            'rekening_id' => $rekening[0]->id,
            'tgl_transaksi' => Carbon::now()->toDateTimeString(),
            'jenis_transaksi' => $request->jenis_transaksi,
            'saldo_transaksi' => $request->jumlah_setoran,
        ]);
        $transaksi->save();
        return redirect()->route('admin.transaksi-setor')->with('success', 'Setoran untuk rekening '. $request->no_rek. ' sejumlah '. $request->jumlah_setoran . ' berhasil dengan kode '. $transaksi->kode_transaksi);
    }

    public function tarikTunai(Request $request)
    {
        $rekening = Rekening::where('no_rekening', $request->no_rek)->get();
        $kalkusaldo = $rekening[0]->total_saldo - $request->jumlah_penarikan;
        //dd($kalkusaldo);
        $saldo = [
            "total_saldo" => $kalkusaldo,
        ];
        Rekening::where('no_rekening', $request->no_rek)->update($saldo);
        $transaksi = Transaksi::create([
            'rekening_id' => $rekening[0]->id,
            'tgl_transaksi' => Carbon::now()->toDateTimeString(),
            'jenis_transaksi' => $request->jenis_transaksi,
            'saldo_transaksi' => $request->jumlah_penarikan,
        ]);
        $transaksi->save();
        return redirect()->route('admin.transaksi-tarik')->with('success', 'Penarikan saldo sebesar Rp. '. $request->jumlah_penarikan . 'untuk rekening ' . $request->no_rek . ' dengan kode '. $transaksi->kode_transaksi);
    }
}
