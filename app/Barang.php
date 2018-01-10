<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barangs';
    protected $fillable = ['stock','harga_jual'];
    protected $visible = ['stock','harga_jual'];
    public $timestamps = true;

    public function barang()
    {
    	return $this->hasMany('App\Barang','id_barang');
    }
    public function transaksi()
    {
    	return $this->belongsTo('App\transaksi','id_transaksi');
    }
}
