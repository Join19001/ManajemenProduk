<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Barang;
use App\Models\Buku;
use App\Models\detail_pesanan;
use App\Models\Haki;
use App\Models\Pesanan;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AdminPenerbitanController extends Controller
{
    public function indexAdminPenerbitan(){
        $buku = Buku::get();
        $artikel = Artikel::get();
        $haki = Haki::get();
        
        return view('adminPenerbitan', ['bukus' => $buku, 'artikels' => $artikel, 'hakis' => $haki]);
    }

    public function downloadBuku($filename){
        $file = public_path('buku').'/'.$filename;
        $header = ['Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        return response()->download($file, 'buku', $header);
    }

    public function accBuku($id, Request $request){
        $request->validate([
            'tahunTerbit' => 'required',
            'harga' => 'required | integer'
        ]);

        Buku::where('idBuku', $id)->update(['tahunTerbit' => $request->tahunTerbit, 'harga' => $request->harga, 'active' => true]);

        if(Cookie::has('login')){
            return redirect('/AdminPenerbitan');
        } else {
            return redirect('/layanan');
        }
    }

    public function downloadArtikelDoc($filename){
        $file = public_path('artikel/docs').'/'.$filename;
        $header = ['Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        return response()->download($file, 'dokumen-artikel', $header);
    }

    public function downloadArtikelPdf($filename){
        $file = public_path('artikel/pdf').'/'.$filename;
        $header = ['Content-Type' => 'application/pdf'];

        return response()->download($file, 'dokumenPDF-artikel', $header);
    }

    public function downloadHaki($filename){
        $file = public_path('haki/dokumen').'/'.$filename;
        $header = ['Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        return response()->download($file, 'dokumen-haki', $header);
    }

    public function deleteBuku($id){
        Buku::where('idBuku', $id)->delete();

        return redirect('/AdminPenerbitan');
    }

    public function deleteArtikel($id){
        Artikel::where('idArtikel', $id)->delete();

        return redirect('/AdminPenerbitan');
    }

    public function deleteHaki($id){
        Haki::where('idHaki', $id)->delete();

        return redirect('/AdminPenerbitan');
    }
}

