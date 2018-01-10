<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $table = 'laporans';
    protected $fillable = ['transaksi_id'];
    protected $visible = ['transaksi_id'];
    public $timestamps = true;
    
     public function transaksi()
    {
    	return $this->belongsTo('App\Transaksi','transaksi_id');
    }
}
