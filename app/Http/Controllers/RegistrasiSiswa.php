<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegistrasiSiswa extends Controller
{
    //

     /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/siswa/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create(){
    	$kelass = Kelas::all();
    	//dd($kelass);
    	return view('auth.siswa-registrasi', compact('kelass'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    	//dd($data);
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', //remove email
            'password' => 'required|string',
            'TTL' => 'required',
            'asal_sekolah' => 'required|string',
            'no_tel' => 'required',
            'kelas_id' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function store(Request $request)
    {
    	$validate = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', //remove email
            'password' => 'required|string',
            'TTL' => 'required',
            'asal_sekolah' => 'required|string',
            'no_tel' => 'required',
            'kelas_id' => 'required'

        ]);


         // jika form kosong maka artinya fails() atau gagal di proses, maka di return redirect()->back()->with('after_update', $after_update) artinya page di kembalikan ke form dengan membawa session after_update yang sudah kita deklarasi di atas.
        if($validate->fails()){
            return redirect()->back();
        }


        $siswa = new Siswa;
        $siswa->name = $request->name;
        $siswa->username = $request->username;
        $siswa->password = bcrypt($request->password);
        $siswa->TTL = $request->TTL;
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->no_tel = $request->no_tel;
        $siswa->kelas_id = $request->kelas_id;

        $siswa->save();

        // return Siswa::create([
        //     'name' => $reuest['name'],
        //     'username' => $reuest['username'], //change to username
        //     'password' => bcrypt($reuest['password']),
        // ]);

        return view('auth.siswa-login');
    }
}
