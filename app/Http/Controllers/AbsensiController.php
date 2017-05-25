<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Guru;
use App\Siswa;
use App\Absensi;
use Illuminate\Http\Request;
use Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $id_kelas;

    public function __construct()
    {
        $this->middleware('auth:guru'); // cuma yang punya guard admin yang bisa
    }

    public function index($id)
    {
        // ngambil data dari database
        // $kelass = Kelas::all();
        //$kelass = Guru::find($id)->kelas()->get();
        //dd($kelass);
        // $this->id_kelas = $id;
        //dd($this->id_kelas);
        $user = Auth::user();
        $kelass = Guru::find($user->id)->kelas()->get();

        $siswas = Kelas::find($id)->siswa;
        //dd($siswas);
        return view('absensi.absensiswa', compact('siswas' , 'kelass'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absensi.absensiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($this->id_kelas);
       //dd($request);
               //$kelas = $request->get('kelas');
               //dd($kelas);
        $input = $request->except('_token');
        $kelass = Siswa::find(2)->kelas()->get();
        //dd($kelass[0]['attributes']['id']);
        //dd($input);
        foreach ($input as $key => $val) {
            $implode = explode('-', $key);
            //dd($val);
            $id_siswa = $implode[1];
            $absensi = new Absensi();
            $absensi->siswa_id = $id_siswa;
            // $absensi->id_kelas = $kelas;
            $kelass = Siswa::find($id_siswa)->kelas()->get();
            $absensi->kelas_id = $kelass[0]['attributes']['id'];
            $absensi->absen = $val;
            $absensi->save();
        }
        // $data = [
        //     'nama_kelas' => $request->nama_kelas,
        //     'tahun_ajaran' => $request->tahun_ajaran
        // ];

        // $store = Kelas::insert($data);
        
        // jika berhasil kembalikan ke page form dengan membawa session after_save success.
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $showById = Kelas::find($id);
       return view('crud.kelas.edit' , compact('showById'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
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

        $update = Kelas::where('id', $id)->update($data);

        return redirect()->to('kelas')->with('after_update', $after_update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Kelas::findOrFail($id)->delete();
        
        return redirect()->back()->with('success');
    }
}
