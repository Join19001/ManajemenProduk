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

    public function downloadArtikel($filename){
        $file = public_path('artikel').'/'.$filename;
        $header = ['Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        return response()->download($file, 'dokumen-artikel', $header);
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

