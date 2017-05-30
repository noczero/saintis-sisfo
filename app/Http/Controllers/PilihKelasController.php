<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use Auth;
use App\Kelas;

class PilihKelasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:guru'); // cuma yang punya guard admin yang bisa
    }

    public function index($id) {
    	$gurus = Guru::find($id);
    	$AllKelass = Kelas::all();
        // //return $guru;
        //$this->middleware('auth:guru'); // cuma yang punya guard admin yang bisa
        $kelass = Guru::findOrFail($id)->kelas()->get();
    	//dd($gurus->kelas);

  //   	foreach ($gurus->kelas as $kelas) {
  //   			echo $kelas->pivot->kelas_id;
		// }

		//$gurus = Guru::find($id)->with('kelas')->get();
		//dd($gurus);
    	return view('crud.guru.pilih-kelas' , compact('gurus' ,'kelass' , 'AllKelass', 'id'));
    }

    public function store(Request $req , $id) {

    	$guru = Guru::find($id);

    	$guru->kelas()->attach($req->kelas_id , ['mapel' => $req->mapel]);

    	return redirect()->route('pilih-kelas.view' , array('id' => $id));
    }

    public function destroy($id) {
    	$user = Auth::user();
    	$guru = Guru::find($user->id);

    	$guru->kelas()->detach($id);

    	return redirect()->route('pilih-kelas.view' , array('id' => $user->id));
    }
}
