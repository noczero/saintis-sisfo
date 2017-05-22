<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check
        $gurus = Guru::with('kelas')->get(); //get many to many data with the pivot 'kelas is the method in model'

        return $gurus;
        // return view('home');
    }
}
