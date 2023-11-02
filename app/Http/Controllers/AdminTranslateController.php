<?php

namespace App\Http\Controllers;

use App\Models\Translate;

class AdminTranslateController extends Controller
{
    public function indexAdminTranslate(){
        $translate = Translate::get();
        
        return view('adminTranslate', ['translates' => $translate]);
    }

    public function deleteTranslate($id){
        Translate::where('idTranslate', $id)->delete();

        return redirect('/AdminTranslate');
    }
}

