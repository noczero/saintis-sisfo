<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class ManageSiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:manager'); // cuma yang punya guard manager yang bisa
    }


    public function index()
    {
        //$siswas = Siswa::get();
        $siswas = Siswa::with('kelas')->get();
        //echo $siswas->kelas->nama_kelas;
        //User::find(1)->phone;
        //dd($siswas);
        return view('crud.siswa.view' , compact('siswas')); //redirect ke view
    }


    public function create()
    {
        return view('crud.siswa.create');
    }


    public function store(Request $request)
    {
        // nyimpan data 
        // memvalidasi inputan users, form tidak boleh kosong (required)
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


    public function show($id)
    {
       $showById = Kelas::find($id);
       return view('crud.siswa.edit' , compact('showById'));
    }

    public function edit(Kelas $siswa)
    {
        //
    }

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

        $update = Kelas::where('id', $id)->update($data);

        return redirect()->to('manage-siswa')->with('after_update', $after_update);
    }


    public function destroy($id)
    {
        $destroy = Kelas::findOrFail($id)->delete();
        
        return redirect()->back()->with('success');
    }
}
