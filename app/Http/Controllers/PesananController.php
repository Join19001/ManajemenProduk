<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\detail_pesanan;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function tambahPesanan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();
        $pesanan_detail = new detail_pesanan();
        $pesanan = new Pesanan();

        //Cek Validasi
        $cek_pesanan = Pesanan::where('idUser', FacadesAuth::user()->idUser)->where('status',0)->first();
        //Memasukkan data pesanan secara total
        if(empty($cek_pesanan)){
            $pesanan->idUser = FacadesAuth::user()->idUser;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->totalHarga = $barang->hrgTinggi * 1;
            $pesanan->save();
        }

        $pesanan_baru = Pesanan::where('idUser', FacadesAuth::user()->idUser)->where('status',0)->first();

        //Masukkan data detail pesanan yang berisi barang yang dipesan ke keranjang dan cek detail pesanan
        $cek_pesanan_detail = detail_pesanan::where('idBarang', $barang->id)->where('idPesanan', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
            $pesanan_detail->idBarang = $barang->id;
            $pesanan_detail->namaBarang = $barang->namaBarang;
            $pesanan_detail->idPesanan = $pesanan_baru->id;
            $pesanan_detail->jumlah = 1;
            $pesanan_detail->hrgSatuan = $barang->hrgTinggi;
            $pesanan_detail->subTotal = $pesanan_detail->hrgSatuan * $pesanan_detail->jumlah;
            $pesanan_detail->save();
        }else{
            $pesanan_detail = detail_pesanan::where('idBarang', $barang->id)->where('idPesanan', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = 1;
            $pesanan_detail->hrgSatuan = $barang->hrgTinggi * $pesanan_detail->jumlah;
            $pesanan_detail->update();
        }

        return redirect('/beranda');
    }

    public function keranjang()
    {
        $cek_pesanan = Pesanan::where('idUser', FacadesAuth::user()->idUser)->where('status',0)->first();
        
        if(empty($cek_pesanan)){
            return redirect('/beranda')->with('empty', 'Tidak ada barang dalam keranjang');
        }else{
            $cekDetail = detail_pesanan::where('idPesanan', $cek_pesanan->id)->sum('subTotal');

            $cek_pesanan->totalHarga = $cekDetail;
            $cek_pesanan->update();

            $pesanan = detail_pesanan::join('pesanans', 'pesanans.id', '=', 'detail_pesanans.idPesanan')->where('pesanans.status','=','0')
                                    ->join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')->where('pesanans.idUser', FacadesAuth::user()->idUser)
                                    ->get(['barangs.namaBarang', 'barangs.namaLapak', 'barangs.satuan', 'barangs.stok','detail_pesanans.jumlah', 
                                    'detail_pesanans.id', 'pesanans.totalHarga', 'detail_pesanans.hrgSatuan', 'detail_pesanans.subTotal'
                                    , 'barangs.foto']);

            return view('keranjang', ['pesanan' => $pesanan]);
        }
    }

    public function deleteKeranjang($id)
    {
        detail_pesanan::where('id', $id)->delete();
        $cek_pesanan = Pesanan::where('idUser', FacadesAuth::user()->idUser)->where('status',0)->first();
        $cekDetail = detail_pesanan::where('idPesanan', $cek_pesanan->id)->get();

        if(sizeof($cekDetail) == 0){
            $barang = DB::table('barangs')->get();
            $cek_pesanan->delete();
            return redirect('/beranda')->with(['barang' => $barang]);
        } else{
            $pesanan = detail_pesanan::join('pesanans', 'pesanans.id', '=', 'detail_pesanans.idPesanan')->where('pesanans.status','=','0')
                                    ->join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')->where('pesanans.idUser', FacadesAuth::user()->idUser)
                                    ->get(['barangs.namaBarang', 'barangs.namaLapak', 'barangs.satuan', 'barangs.stok','detail_pesanans.jumlah', 
                                    'detail_pesanans.id', 'pesanans.totalHarga', 'detail_pesanans.hrgSatuan', 'detail_pesanans.subTotal'
                                    , 'barangs.foto']);

            return redirect()->back()->with(['pesanan' => $pesanan]);
        }
    }

    public function pembayaran()
    {   
        $detailPesanan = detail_pesanan::join('pesanans', 'pesanans.id', '=', 'detail_pesanans.idPesanan')->where('pesanans.status','=','0')
                                    ->join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')->where('pesanans.idUser', FacadesAuth::user()->idUser)
                                    ->get(['barangs.namaBarang', 'detail_pesanans.jumlah', 'detail_pesanans.hrgSatuan', 'pesanans.totalHarga']);
        
        return view('pembayaran', ['detail' => $detailPesanan]);
    }

    public function selesaiBayar()
    {
        $pesanan = Pesanan::where('idUser', FacadesAuth::user()->idUser)->where('status',0)->first();
        $det = detail_pesanan::where('idPesanan', $pesanan->id)->get();
        foreach ($det as $key) {
            $barang = Barang::where('id', $key->idBarang)->first();
            $barang->stok = $barang->stok - $key->jumlah;
            $barang->update();
        }
        $pesanan->status = '1';
        $pesanan->update();
        $barang = Barang::get();
        return redirect('/beranda')->with(['Paid' => 'Berhasil Membayar', 'barang' => $barang]);
    }

    public function pesanan1()
    {
        $barang = detail_pesanan::join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')
                                    ->get(['barangs.namaBarang', 'detail_pesanans.idPesanan']);
        

        $pesanan = Pesanan::where('idUser', FacadesAuth::user()->idUser)->where('status',1)->get();;

        return view('pesanan-1', ['barang' => $barang, 'detail' => $pesanan]);
    }

    public function pesanan2()
    {
        $barang = detail_pesanan::join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')
                                    ->get(['barangs.namaBarang', 'detail_pesanans.idPesanan']);
        

        $pesanan = Pesanan::where('idUser', FacadesAuth::user()->idUser)->where('status',2)->get();;

        return view('pesanan-2', ['barang' => $barang, 'detail' => $pesanan]);
    }

    public function indexTawar($id)
    {
        $detail = detail_pesanan::where('id', $id)->first();
        return view('tawar', ['detail' => $detail]);
    }

    public function tawar(Request $request)
    {
        $pesanan = detail_pesanan::where('id', $request->idPesanan)->first();
        $barang = detail_pesanan::join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')->where('detail_pesanans.id', $request->idPesanan)
                                    ->first();
        
        if($request->harga >= $barang->hrgRendah && $request->harga <= $barang->hrgTinggi){
            $pesanan->hrgSatuan = $request->harga;
            $pesanan->subTotal = $pesanan->jumlah * $request->harga;
            $pesanan->update();
            return redirect('/keranjang')->with('accept', 'Penawaran Diterima');
        }else{
            return redirect()->back()->with('reject', 'Tawaran Ditolak');
        }
    }

    public function updateJumlah(Request $request, $id)
    {
        $update = detail_pesanan::where('id', $id)->first();
        $update->jumlah = $request->jumlah;
        $update->subTotal = $update->hrgSatuan * $request->jumlah;
        $update->update();

        $cek_pesanan = Pesanan::where('idUser', FacadesAuth::user()->idUser)->first();
        $cekDetail = detail_pesanan::where('idPesanan', $cek_pesanan->id)->sum('subTotal');

        $cek_pesanan->totalHarga = $cekDetail;
        $cek_pesanan->update();
        

        $pesanan = detail_pesanan::join('pesanans', 'pesanans.id', '=', 'detail_pesanans.idPesanan')->where('pesanans.status','=','0')
                                ->join('barangs', 'barangs.id', '=', 'detail_pesanans.idBarang')->where('pesanans.idUser', FacadesAuth::user()->idUser)
                                ->get(['barangs.namaBarang', 'barangs.namaLapak', 'barangs.satuan', 'barangs.stok','detail_pesanans.jumlah', 
                                'detail_pesanans.id', 'pesanans.totalHarga', 'detail_pesanans.hrgSatuan', 'detail_pesanans.subTotal']);

        return redirect()->back()->with(['pesanan' => $pesanan]);
    }
}
