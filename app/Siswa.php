<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use Notifiable;
    //protected $guard = 'siswa'; // harus sama di guards di auth.php
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'TTL' ,  'asal_sekolah' ,'paket_bimbel' , 'kelas_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // mutator untuk age dari attribute TTL
    public function getAgeAttribute()
    {
        $dateNow = Carbon::now();
        return ($dateNow->diffInYears(Carbon::parse($this->attributes['TTL'])));    
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
