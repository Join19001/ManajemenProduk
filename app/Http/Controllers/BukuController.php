<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    // public function getAll(){
        
    //     $barang = DB::table('barangs')->get();
    //     return view('home', ['barang' => $barang]);
    // }

    // public function getAllAdmin(){
        
    //     $barang = DB::table('barangs')->get();
    //     return view('adminBarang', ['barang' => $barang]);
    // }

    public function indexLayananBuku(){
        return view('layananBuku');
    }

    public function insertBuku(Request $request){
        $request->validate([
            'jenisBuku' => 'required',
            'kategoriBuku' => 'required',
            'namaPenulis' => 'required',
            'judulBuku' => 'required',
            'tahunTerbit' => 'required',
            'dokumen' => 'required|mimes:doc,docx|max:10000'
        ]);

        $fileName = time().'.'.$request->dokumen->extension();
        $request->dokumen->move(public_path('buku'), $fileName);

        Buku::create([
            'jenisBuku' => $request->jenisBuku,
            'kategoriBuku' => $request->kategoriBuku,
            'namaPenulis' => $request->namaPenulis,
            'judulBuku' => $request->judulBuku,
            'tahunTerbit' => $request->tahunTerbit,
            'dokBuku' => $fileName
        ]);

        return redirect('/layanan');
    }

    // public function editBarang(Request $request, $id){
    //     $request->validate([
    //         'namaLapak' => 'required',
    //         'namaBarang' => 'required',
    //         'stok' => 'required|numeric',
    //         'satuan' => 'required',
    //         'hrgTinggi' => 'required|numeric',
    //         'hrgRendah' => 'required|numeric|lt:hrgTinggi'
    //     ]);

    //     $barang = Barang::where('id', $id)->first();
    //     $barang->namaLapak = $request->namaLapak;
    //     $barang->namaBarang = $request->namaBarang;
    //     $barang->stok = $request->stok;
    //     $barang->satuan = $request->satuan;
    //     $barang->hrgTinggi = $request->hrgTinggi;
    //     $barang->hrgRendah = $request->hrgRendah;
    //     $barang->update();

    //     return redirect('/barang-admin');
    //}
}

