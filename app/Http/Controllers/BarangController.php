<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\detail_pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function getAll(){
        
        $barang = DB::table('barangs')->get();
        return view('home', ['barang' => $barang]);
    }

    public function getAllAdmin(){
        
        $barang = DB::table('barangs')->get();
        return view('adminBarang', ['barang' => $barang]);
    }

    public function IndexAdminBarang(){
        return view('tambahBarang');
    }

    public function insertBarang(Request $request){
        $request->validate([
            'namaLapak' => 'required',
            'namaBarang' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'hrgTinggi' => 'required',
            'hrgRendah' => 'required|lt:hrgTinggi',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('img'), $imageName);

        Barang::create([
            'namaLapak' => $request->namaLapak,
            'namaBarang' => $request->namaBarang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'hrgTinggi' => $request->hrgTinggi,
            'hrgRendah' => $request->hrgRendah,
            'foto' => $imageName
        ]);

        return redirect('/barang-admin');
    }

    public function indexEdit($id)
    {
        $barang = Barang::where('id', $id)->first();

        return view('editBarang', ['barang' => $barang]);
    }

    public function editBarang(Request $request, $id){
        $request->validate([
            'namaLapak' => 'required',
            'namaBarang' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'hrgTinggi' => 'required|numeric',
            'hrgRendah' => 'required|numeric|lt:hrgTinggi'
        ]);

        $barang = Barang::where('id', $id)->first();
        $barang->namaLapak = $request->namaLapak;
        $barang->namaBarang = $request->namaBarang;
        $barang->stok = $request->stok;
        $barang->satuan = $request->satuan;
        $barang->hrgTinggi = $request->hrgTinggi;
        $barang->hrgRendah = $request->hrgRendah;
        $barang->update();

        return redirect('/barang-admin');
    }
}

