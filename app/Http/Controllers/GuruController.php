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
        $this->middleware('auth:manager'); // cuma yang punya guard admin yang bisa
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        // ngambil data dari database
        //$gurus = Guru::all();
        //$gurus = Guru::with('kelas')->all();
        $gurus = Guru::with('kelas')->get(); //get many to many data with the pivot 'kelas is the method in model'


        //return $guru;
        return view('crud.guru.view', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // nyimpan data 
        // memvalidasi inputan users, form tidak boleh kosong (required)
        // nama_kendaraan,jenis_kendaraan,made_in,pemilik adalah name yang ada di form, contoh name="nama_kendaran" (lihat form)
        // \Validator adalah class yg ada pada Laravel untuk validasi
        // $request->all() adalah semua inputan dari form kita validasi

        $validate = \Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'tahun_ajaran' => 'required'
        ],

        // $after_save adalah isi session ketika form kosong dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan error dan alert warna merah di ambil dari 'alert' => 'danger', dst.

        $after_save = [
            'alert' => 'danger',
            'title' => 'Oh wait!',
            'text-1' => 'Ada kesalahan',
            'text-2' => 'Silakan coba lagi.'
        ]);


         // jika form kosong maka artinya fails() atau gagal di proses, maka di return redirect()->back()->with('after_save', $after_save) artinya page di kembalikan ke form dengan membawa session after_save yang sudah kita deklarasi di atas.
        if($validate->fails()){
            return redirect()->back()->with('after_save', $after_save);
        }

        // $after_save adalah isi session ketika data berhasil disimpan dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan success dan alert warna merah di ganti menjadi warna hijau di ambil dari 'alert' => 'success', dst.
        $after_save = [
        'alert' => 'success',
        'title' => 'Good Job!',
        'text-1' => 'Tambah lagi',
        'text-2' => 'Atau kembali.'
        ];

        $data = [
            'nama_kelas' => $request->nama_kelas,
            'tahun_ajaran' => $request->tahun_ajaran
        ];

        $store = Kelas::insert($data);
        
        // jika berhasil kembalikan ke page form dengan membawa session after_save success.
        
        return redirect()->back()->with('after_save', $after_save);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $showById = Guru::find($id);
       return view('crud.guru.edit' , compact('showById'));
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validate = \Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'tahun_ajaran' => 'required'
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
            'nama_kelas' => $request->nama_kelas,
            'tahun_ajaran' => $request->tahun_ajaran
        ];

        $update = Guru::where('id', $id)->update($data);

        return redirect()->to('guru')->with('after_update', $after_update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Guru::findOrFail($id)->delete();
        
        return redirect()->back()->with('success');
    }
}
