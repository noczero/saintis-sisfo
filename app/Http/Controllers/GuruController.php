<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:guru'); // cuma yang punya guard admin yang bisa
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        // // ngambil data dari database
        // //$gurus = Guru::all();
        // //$gurus = Guru::with('kelas')->all();
        // $gurus = Guru::with('kelas')->get(); //get many to many data with the pivot 'kelas is the method in model'


        // //return $guru;
        //$this->middleware('auth:guru'); // cuma yang punya guard admin yang bisa

        return view('guru');
    }

    // 
}
