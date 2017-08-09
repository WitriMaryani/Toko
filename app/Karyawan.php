<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $table = 'karyawans';
    protected $fillable = ['nama','jk','alamat','email'];
    protected $visible = ['nama','jk','alamat','email'];
    public $timestamps = true;

    public function transaksi()
    {
    	return $this->hasMany('App\Transaksi','karyawan_id');
    }
}
