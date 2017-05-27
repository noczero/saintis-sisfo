<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin'); // cuma yang punya guard admin yang bisa
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jumlahGuru = DB::table('gurus')->count();
        $jumlahSiswa = DB::table('siswas')->count();
        $kelass = DB::table('kelass')->orderBy('nama_kelas')->get();

        return view('admin' , compact('jumlahGuru', 'jumlahSiswa' ,'kelass')); //redirect ke view
    }
}
