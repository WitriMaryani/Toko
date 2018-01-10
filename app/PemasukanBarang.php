<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemasukanBarang extends Model
{
    //
    protected $table = 'Pemasukan_barangs';
    protected $fillable = ['id_supplier','id_barang','jumlah'];
    protected $visible = ['id_supplier','id_barang','jumlah'];
    public $timestamps = true;

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier','id_supplier');
    }
    public function barang()
    {
    	return $this->belongsTo('App\Barang','id_barang');
    }
}
