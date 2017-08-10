<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table = 'pelanggans';
    protected $fillable = ['nama'];
    protected $visible = ['nama'];
    public $timestamps = true;

    public function transaksi()
    {
    	return $this->hasMany('App\Transaksi','pelanggan_id');
    }
}
