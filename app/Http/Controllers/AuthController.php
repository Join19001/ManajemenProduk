<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewRegister(){

        return view('register');
    }

    public function postRegister(Request $request) {
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'confirm_password' => 'required|same:password',
            'nama' => 'required|string',
            'noTelp' => 'required|max:12|regex:/^([0-9\s\-\+\(\)]*)$/'
        ]);

        User::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'noTelp' => $request->noTelp,
        ]);

        return redirect('/masuk')->with('registered', 'Akun berhasil dibuat');
    }

    public function viewLogin() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        ]);

        if($request->email == 'admin@gmail.com'){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/user-admin');
            }
    
            return redirect()->back()->with('auth_failed', 'Email dan password salah!');
        }else{
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/beranda');
            }
    
            return redirect()->back()->with('auth_failed', 'Email dan password salah!');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/masuk');
    }
}
