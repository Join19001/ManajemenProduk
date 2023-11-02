<?php

namespace App\Http\Controllers;

use App\Models\detail_pesanan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        ]);

        $role = DB::table('users')->where('email', $request->email)->first('role');

        if($role->role === "Super Admin"){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/superAdmin')->withCookie('login', 'superAdmin', 60);
            }
    
            return redirect()->back()->with('auth_failed', 'Email dan password salah!');
        } else if ($role->role == 'Admin Penerbitan') {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/AdminPenerbitan')->withCookie('login', 'AdminPenerbitan', 60);
            }
    
            return redirect()->back()->with('auth_failed', 'Email dan password salah!');
        } else if ($role->role == 'Admin Translate') {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/AdminTranslate')->withCookie('login', 'AdminTranslate', 60);
            }
    
            return redirect()->back()->with('auth_failed', 'Email dan password salah!');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $cookie = Cookie::forget('login');
    
        return redirect('/masuk')->withCookie($cookie);
    }
    
    public function indexSuperAdmin(Request $request) {
        if(Cookie::has('login')){
            $user = DB::table('users')->get();
        
            return view('superAdmin', ['user' => $user]);
        } else {
            return redirect('masuk');
        }
    }
    
    public function indexTambahUser(Request $request) {
        if(Cookie::has('login')){
            return view('tambahUser');
        } else {
            return redirect('masuk');
        }
    }

    public function insertUser(Request $request){
        if(Cookie::has('login')){
            $request->validate([
                'nama' => 'required',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string',
                'role' => 'required'
            ]);

            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return redirect('/superAdmin');
        } else {
            return redirect('masuk');
        }
    }

    public function deleteUser($id){
        if(Cookie::has('login')){
            DB::table('users')->where('idUser', $id)->delete();
            return redirect('/superAdmin');
        } else {
            return redirect('masuk');
        }
    }
}

