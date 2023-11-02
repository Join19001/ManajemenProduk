<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Buku;
use App\Models\Haki;
use App\Models\Pengeditan;
use App\Models\Plagiasi;
use App\Models\Seminar;
use App\Models\Translate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    // public function getAll(){
        
    //     $barang = DB::table('barangs')->get();
    //     return view('home', ['barang' => $barang]);
    // }

    // public function getAllAdmin(){
        
    //     $barang = DB::table('barangs')->get();
    //     return view('adminBarang', ['barang' => $barang]);
    // }

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
    
    # Layanan Penerbitan Buku
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

        if(Cookie::has('login')){
            return redirect('/AdminPenerbitan');
        } else {
            return redirect('/layanan');
        }
    }


    # Layanan Penerbitan Artikel
    public function indexLayananArtikel(){
        return view('layananArtikel');
    }

    public function insertArtikel(Request $request){
        $request->validate([
            'jenisArtikel' => 'required',
            'kategoriArtikel' => 'required',
            'namaPenulis' => 'required',
            'judulArtikel' => 'required',
            'Affiliasi' => 'required',
            'email' => 'required',
            'dokumen' => 'required|mimes:doc,docx|max:10000'
        ]);

        $fileName = time().'.'.$request->dokumen->extension();
        $request->dokumen->move(public_path('artikel'), $fileName);

        Artikel::create([
            'jenisArtikel' => $request->jenisArtikel,
            'kategoriArtikel' => $request->kategoriArtikel,
            'namaPenulis' => $request->namaPenulis,
            'judulArtikel' => $request->judulArtikel,
            'affiliasi' => $request->Affiliasi,
            'email' => $request->email,
            'dokArtikel' => $fileName
        ]);

        if(Cookie::has('login')){
            return redirect('/AdminPenerbitan');
        } else {
            return redirect('/layanan');
        }
    }


    # Layanan Penerbitan Haki
    public function indexLayananHaki(){
        return view('layananHaki');
    }

    public function insertHaki(Request $request){
        $request->validate([
            'jenisKarya' => 'required',
            'jenisHaki' => 'required',
            'judulHaki' => 'required',
            'tanggalPembuatan' => 'required',
            'KTP' => 'required|mimes:jpg,jpeg,png',
            'dokumen' => 'required|mimes:doc,docx|max:10000',
            'deskripsi' => 'required'
        ]);

        $time = time();
        $ktp = $time.'.'.$request->KTP->extension();
        $fileName = $time.'.'.$request->dokumen->extension();
        $request->dokumen->move(public_path('haki/dokumen'), $fileName);
        $request->KTP->move(public_path('haki/ktp'), $ktp);

        Haki::create([
            'jenisProduk' => $request->jenisKarya,
            'layananHaki' => $request->jenisHaki,
            'judulProduk' => $request->judulHaki,
            'tglPembuatan' => $request->tanggalPembuatan,
            'ktp' => $ktp,
            'dokProduk' => $fileName,
            'deskripsi' => $request->deskripsi
        ]);

        if(Cookie::has('login')){
            return redirect('/AdminPenerbitan');
        } else {
            return redirect('/layanan');
        }
    }


    # Layanan Pengecekan Plagiasi
    public function indexLayananPlagiasi(){
        return view('layananPlagiasi');
    }

    public function insertPlagiasi(Request $request){
        $request->validate([
            'namaPenulis' => 'required',
            'judulArtikel' => 'required',
            'Affiliasi' => 'required',
            'email' => 'required',
            'dokumen' => 'required|mimes:doc,docx|max:10000',
        ]);

        $time = time();
        $fileName = $time.'.'.$request->dokumen->extension();
        $request->dokumen->move(public_path('plagiasi'), $fileName);

        Plagiasi::create([
            'namaPenulis' => $request->namaPenulis,
            'judulArtikel' => $request->judulArtikel,
            'Affiliasi' => $request->Affiliasi,
            'email' => $request->email,
            'dokPlagiasi' => $fileName
        ]);

        return redirect('/layanan');
    }


    # Layanan Translate
    public function indexLayananTranslate(){
        return view('layananTranslate');
    }

    public function insertTranslate(Request $request){
        $request->validate([
            'nama' => 'required',
            'translate' => 'required',
            'teks' => 'required',
        ]);

        Translate::create([
            'namaUser' => $request->nama,
            'translate' => $request->translate,
            'teks' => $request->teks
        ]);

        if(Cookie::has('login')){
            return redirect('/AdminTranslate');
        } else {
            return redirect('/layanan');
        }
    }


    # Layanan Pengeditan Kosa Kata
    public function indexLayananPengeditan(){
        return view('layananPengeditan');
    }

    public function insertPengeditan(Request $request){
        $request->validate([
            'nama' => 'required',
            'translate' => 'required',
            'format' => 'required|mimes:doc,docx|max:10000',
            'dokumen' => 'required|mimes:doc,docx|max:10000'
        ]);

        $time = time();
        $format = $time.'.'.$request->format->extension();
        $dokumen = $time.'.'.$request->dokumen->extension();
        $request->dokumen->move(public_path('pengeditan/dokumen'), $dokumen);
        $request->format->move(public_path('pengeditan/format'), $format);

        Pengeditan::create([
            'namaUser' => $request->nama,
            'bahasa' => $request->translate,
            'dokFormat' => $format,
            'dokPengeditan' => $dokumen
        ]);

        return redirect('/layanan');
    }


    # Layanan Pendaftaran Seminar
    public function indexSeminarPeserta(){
        return view('peserta');
    }

    public function insertPeserta(Request $request){
        $request->validate([
            'jenisSeminar' => 'required',
            'namaSeminar' => 'required',
            'namaPendaftar' => 'required',
            'nomor' => 'required',
            'email' => 'required',
            'buktiBayar' => 'required|mimes:jpg,jpeg,png',
        ]);

        $time = time();
        $buktiBayar = $time.'.'.$request->buktiBayar->extension();
        $request->buktiBayar->move(public_path('seminar/buktiBayar'), $buktiBayar);

        Seminar::create([
            'jenisSeminar' => $request->jenisSeminar,
            'namaSeminar' => $request->namaSeminar,
            'role' => 'Peserta',
            'namaPendaftar' => $request->namaPendaftar,
            'nomorHP' => $request->nomor,
            'email' => $request->email,
            'buktiBayar' => $buktiBayar,
            'dokAbstrak' => null,
            'dokPemakalah' => null,
            'pdfPemakalah' => null
        ]);

        if(Cookie::has('login')){
            return redirect('/AdminPenerbitan');
        } else {
            return redirect('/layanan');
        }
    }

    public function indexSeminarPemakalah(){
        return view('pemakalah');
    }

    public function insertPemakalah(Request $request){
        $request->validate([
            'jenisSeminar' => 'required',
            'namaSeminar' => 'required',
            'namaPendaftar' => 'required',
            'nomor' => 'required',
            'email' => 'required',
            'buktiBayar' => 'required|mimes:jpg,jpeg,png',
            'abstrak' => 'required|mimes:doc,docx|max:10000',
            'dokumenWord' => 'required|mimes:doc,docx|max:10000',
            'dokumenPDF' => 'required|mimes:pdf|max:10000'
        ]);

        $time = time();
        $buktiBayar = $time.'.'.$request->buktiBayar->extension();
        $abstrak = $time.'.'.$request->abstrak->extension();
        $dokumenWord = $time.'.'.$request->dokumenWord->extension();
        $dokumenPDF = $time.'.'.$request->dokumenPDF->extension();

        // Move to Public Folder
        $request->buktiBayar->move(public_path('seminar/buktiBayar'), $buktiBayar);
        $request->abstrak->move(public_path('seminar/abstrak'), $abstrak);
        $request->dokumenWord->move(public_path('seminar/word'), $dokumenWord);
        $request->dokumenPDF->move(public_path('seminar/pdf'), $dokumenPDF);

        Seminar::create([
            'jenisSeminar' => $request->jenisSeminar,
            'namaSeminar' => $request->namaSeminar,
            'role' => 'Pemakalah',
            'namaPendaftar' => $request->namaPendaftar,
            'nomorHP' => $request->nomor,
            'email' => $request->email,
            'buktiBayar' => $buktiBayar,
            'dokAbstrak' => $abstrak,
            'dokPemakalah' => $dokumenWord,
            'pdfPemakalah' => $dokumenPDF
        ]);

        if(Cookie::has('login')){
            return redirect('/AdminPenerbitan');
        } else {
            return redirect('/layanan');
        }
    }
}

