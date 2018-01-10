<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    
    protected $fillable = ['id_barang','jumlah_barang','total'];
    protected $visible = ['id_barang','jumlah_barang','total'];
    public $timestamps = true;

    public function barang()
    {
    	return $this->belongsTo('App\Barang','id_barang');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi','id_transaksi');
    }
}
