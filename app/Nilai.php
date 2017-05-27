<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nilai extends Authenticatable
{
    //
    protected $table = 'nilai';
    protected $guard = 'admin';

   	protected $fillable = ['siswa_id', 'nilai' ];

   	public function siswa(){
   		
   	}
}
