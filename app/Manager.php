<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use Notifiable;
    protected $guard = 'manager'; // harus sama di guards di auth.php
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'TTL' , 'umur' , 'gaji' ,'kelas_ajar' , 'mapel_ajar', 'hari_ajar' , 'status' , 'no_tel' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
