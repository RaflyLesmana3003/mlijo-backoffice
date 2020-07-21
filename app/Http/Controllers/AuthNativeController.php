<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthNativeController extends Controller
{
    public function index()
    {
        return view('nativeauth');
    }
    public function auth(Request $req)
    {
        $email = $req->email;
        $pwd   = $req->password;
        if (Auth::attempt(['phone_number' => $email, 'password' => $pwd])) {
            if (Auth::user()->level == "1") {
                if (Auth::user()->status == "0") {
                    return view('mlijo/menunggu_aktivasi');
                }
                    return view('home');
            }
        } elseif (Auth::attempt(['email' => $email, 'password' => $pwd])) {
            return view('home');
        } else {
            return "Maaf email atau password yang anda masukan tidak sesuai.";
        }
    }
}
