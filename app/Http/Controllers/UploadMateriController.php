<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Guru;

class UploadMateriController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:guru'); // cuma yang punya guard admin yang bisa
    }

    public function index(){
    	//redirect ke materi upload.
    	$user = Auth::user();
		$kelass = Guru::find($user->id)->kelas()->get();
		$gurus = Guru::find($user->id);
		// foreach ($gurus->kelas as $kelas)
		// {
		//     echo $kelas->pivot->mapel;
		// }
		//$gurus = Guru::where('guru_id',$user->id)->with('kelas')->get(); //get many to many data with the pivot 'kelas is the method in model'
		//dd($gurus);
		$listFile = Storage::allfiles('materi');
    	return view('materi.view' , compact('kelass' , 'gurus' , 'listFile'));
    }

    public function create($id){
    	// call list of the file
		$user = Auth::user();
		$kelass = Guru::find($user->id)->kelas()->get();
    	return view('materi.upload' , compact('id' , 'kelass'));
    }

    public function upload(Request $request) {
    	//simpan file
    	//dd($request);
    	//return 'success';
    	if ($request->hasFile('materi')){
	    	$fileName = $request->materi->getClientOriginalName();
	    	//dd($fileName);

	    	$path = Storage::putFileAs(
			    'materi/'.$request->id , $request->file('materi') , $fileName
			); // simpan file sesuai path dengan id materi dan namanya sama yang diupload
    	} else {
    		return 'No File Selected';
    	}

    	return $path;
    	//kembali ke materi view
    	return view('materi.view');
    }
}
