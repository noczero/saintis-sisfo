<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'TTL' , 'umur' , 'gaji' , 'kelas_ajar' , 'mapel_ajar' , 'hari_ajar' , 'status' , 'no_tel' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kelas() {
        return $this->belongsToMany(Kelas::class)->withPivot('mapel'); // pivot tabel ada kolom mapel many to many relationship
    }
}
