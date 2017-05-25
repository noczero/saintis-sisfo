<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;

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
        // mengambil data kelas untuk di form select

        $kelass = Kelas::all();
        //dd($kelass);

        return view('crud.siswa.create' , compact('kelass'));
    }


    public function store(Request $request)
    {
        // nyimpan data 
        // memvalidasi inputan users, form tidak boleh kosong (required)
        // \Validator adalah class yg ada pada Laravel untuk validasi
        // $request->all() adalah semua inputan dari form kita validasi

        $validate = \Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'TTL' => 'required|date:YYYY-MM-DD',
            'asal_sekolah' => 'required',
            'kelas_id' => 'required',
            'paket_bimbel' => 'required',
            'no_tel' => 'required',
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
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'TTL' => $request->TTL,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas_id' => $request->kelas_id,
            'paket_bimbel' => $request->paket_bimbel,
            'no_tel' => $request->no_tel
            
        ];

        $store = Siswa::insert($data);
        
        // jika berhasil kembalikan ke page form dengan membawa session after_save success.
        
        return redirect()->back()->with('after_save', $after_save);
    }


    public function show($id)
    {
       $showById = Siswa::find($id);
       $kelass = Kelas::all();
       return view('crud.siswa.edit' , compact('showById' ,'kelass'));
    }

    public function edit(Kelas $siswa)
    {
        //
    }

    public function update(Request $request, $id)
    {
        
        $validate = \Validator::make($request->all(), [
            'name' => 'required',
            'TTL' => 'required|date:YYYY-MM-DD',
            'asal_sekolah' => 'required',
            'kelas_id' => 'required',
            'paket_bimbel' => 'required',
            'no_tel' => 'required'
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
            'TTL' => $request->TTL,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas_id' => $request->kelas_id,
            'paket_bimbel' => $request->paket_bimbel,
            'no_tel' => $request->no_tel
        ];

        $update = Siswa::where('id', $id)->update($data);

        return redirect()->to('manage-siswa')->with('after_update', $after_update);
    }


    public function destroy($id)
    {
        $destroy = Siswa::findOrFail($id)->delete();
        
        return redirect()->back()->with('success');
    }
}
