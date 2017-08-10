<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'suppliers';
    protected $fillable = ['nama','merk','no_hp'];
    protected $visible = ['nama','merk','no_hp'];
    public $timestamps = true;

    public function pemasukan()
    {
    	return $this->hasMany('App\Pemasukanbarang','supplier_id');
    }
}
