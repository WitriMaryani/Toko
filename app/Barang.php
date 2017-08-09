<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barangs';
    protected $fillable = ['nama','stock','satuan','harga_jual','harga_beli','total_harga'];
    protected $visible = ['nama','stock','satuan','harga_jual','harga_beli','total_harga'];
    public $timestamps = true;

    public function transaksi()
    {
    	return $this->hasMany('App\Transaksi','barang_id');
    }
}
