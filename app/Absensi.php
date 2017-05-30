<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Absensi extends Authenticatable 
{
    //
    //use Authenticatable;
   protected $guard = 'guru';
	//protected $guard = 'manager'; // harus sama di guards di auth.php

    protected $fillable = ['siswa_id', 'kelas_id' , 'absen'];


    
}
