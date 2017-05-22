<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon; //for age


class Guru extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'TTL' , 'gaji' ,  'status' , 'no_tel' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // mutators to calculate age
    public function getAgeAttribute()
    {
        $dateNow = Carbon::now();
        return ($dateNow->diffInYears(Carbon::parse($this->attributes['TTL'])));    
    }



    public function kelas() {
        return $this->belongsToMany(Kelas::class)->withPivot('mapel'); // pivot tabel ada kolom mapel many to many relationship
    }
}
