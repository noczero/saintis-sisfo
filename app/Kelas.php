<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kelas extends Authenticatable 
{
    //
    //use Authenticatable;
   //protected $guard = 'manager';
	//protected $guard = 'manager'; // harus sama di guards di auth.php

    protected $table = 'kelass';
    protected $fillable = ['nama_kelas', 'tahun_ajaran'];

    public function guru() {
    	return $this->belongsToMany(Guru::class);
    }

    public function siswa(){
    	return $this->hasMany('App\Siswa');
    }
}
