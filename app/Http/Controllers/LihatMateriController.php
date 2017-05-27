<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Kelas;
use Storage;

class LihatMateriController extends Controller
{
    //

    public function __construct(){
    	$this->middleware('auth:siswa');
    }

    public function index(){
    	//$kelass = DB::table('guru_kelas')->get();
    	$listFile = Storage::allfiles('public');
    	$subject = array("");
    	$j = 0;
    	for ($i = 0; $i <count($listFile) ; $i++){
    			$pieces = explode('/',$listFile[$i]);

    			if (!in_array($pieces[2], $subject))
    					$subject[$j++] = $pieces[2];

    	}
    	//dd($subject);
    	return view('materi.lihat', compact('listFile' , 'subject'));
    }
}
