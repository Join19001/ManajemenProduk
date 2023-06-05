<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\detail_pesanan;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminController extends Controller
{
    public function adminPesanan1()
    {
        $barang = detail_pesanan::join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')
                                    ->get(['barangs.namaBarang', 'detail_pesanans.idPesanan']);
        

        $pesanan = Pesanan::where('status',1)->get();

        return view('adminPesan1', ['barang' => $barang, 'detail' => $pesanan]);
    }

    public function adminPesanan2()
    {
        $barang = detail_pesanan::join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')
                                    ->get(['barangs.namaBarang', 'detail_pesanans.idPesanan']);
        

        $pesanan = Pesanan::where('status',2)->get();;

        return view('adminPesan2', ['barang' => $barang, 'detail' => $pesanan]);
    }

    public function success($id)
    {
        Pesanan::where('id', $id)->update(['status' => 2]);
        return redirect('/pesan2-admin');
    }

    public function delete($id)
    {
        Barang::where('id', $id)->delete();
        return redirect('barang-admin');
    }

    public function updateBarang(Request $request){

        Barang::where('id', $request->id)->update([
            'namaLapak' => $request->namaLapak,
            'namaBarang' => $request->namaBarang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'hrgTinggi' => $request->hrgTinggi,
            'hrgRendah' => $request->hrgRendah
        ]);

        return redirect('/barang-admin');
    }
}
