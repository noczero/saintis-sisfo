<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SiswaLoginController extends Controller
{

	public function __constructor() {
		$this->middleware('guest:siswa');
	}

    public function showLoginForm() {
    	return view('auth.siswa-login'); //buat view
    }

    public function login(Request $request){
    	// validasi form data
    	$this->validate($request , [
    			'username' => 'required',
    			'password' => 'required'
    		]);

    	// attmpt to log the user
    	// Auth::guard('admin')->attempt($credentials , $remember); //pass the username and password

    	if (Auth::guard('siswa')->attempt(['username' => $request->username , 'password' => $request->password], $request->remember)) {
    		// jika sukses then redirect ke lokasinya
    		return redirect()->intended(route('siswa.dashboard')); //ke dashboard utama
    	}

    	// jika gagal.
    	return redirect()->back()->withInput($request->only('username' , 'remember')); // form kembali terisi tapi cuma username sama remember.

    }
}
