<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:siswa'); // cuma yang punya guard admin yang bisa
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa'); //redirect ke view
    }


    public function show($id)
    {
       $showById = Siswa::find($id);
      // dd($showById);

       return view('profile.siswa' , compact('showById'));
    }

    public function update(Request $request, $id)
    {
        
        $validate = \Validator::make($request->all(), [
             'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'TTL' => 'required|date:YYYY-MM-DD',
            'no_tel' => 'required',
            'asal_sekolah' => 'required'
        ],

         // $after_update adalah isi session ketika form kosong dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan error dan alert warna merah di ambil dari 'alert' => 'danger', dst.

        $after_update = [
            'alert' => 'danger',
            'title' => 'Oh wait!',
            'text-1' => 'Ada kesalahan',
            'text-2' => 'Silakan coba lagi.'
        ]);


         // jika form kosong maka artinya fails() atau gagal di proses, maka di return redirect()->back()->with('after_update', $after_update) artinya page di kembalikan ke form dengan membawa session after_update yang sudah kita deklarasi di atas.
        if($validate->fails()){
            return redirect()->back()->with('after_update', $after_update);
        }

        // $after_save adalah isi session ketika data berhasil disimpan dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan success dan alert warna merah di ganti menjadi warna hijau di ambil dari 'alert' => 'success', dst.
        $after_update = [
            'alert' => 'success',
            'title' => 'Good Job!',
            'text-1' => 'Edit lagi',
            'text-2' => 'Atau kembali.'
        ];

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'TTL' => $request->TTL,
            'no_tel' => $request->no_tel,
            'asal_sekolah' => $request->asal_sekolah
        ];

        $update = Siswa::where('id', $id)->update($data);

        return redirect()->to('profile-siswa/'.$id)->with('after_update', $after_update);
    }

}
