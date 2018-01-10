<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;
use Session;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = Barang::all();
        $transaksi = Transaksi::all();
        return view('transaksi.index',compact('transaksi','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        $barang = Barang::findOrFail($barang->id_barang);
        $jumlah=$barang->stock - $transaksi->jumlah_barang;
        $barang->stock=$jumlah;
        $barang->save();
        return view('transaksi.create',compact('transaksi','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::findOrFail($request->barang);
        $transaksi = new Transaksi;
        
        if ($request->jumlah_barang < $barang->stock) {
            $barang = Barang::findOrFail($request->barang);
            $waktu_transaksi = date('d-m-Y H:i:s');
            $transaksi->id_barang = $request->barang;
            $transaksi->jumlah_barang = $request->jumlah_barang;
            $transaksi->total = $request->jumlah_barang * $barang->harga_jual;
            $transaksi->save();

            $barang = Barang::findOrFail($request->barang);
            $jumlah=$barang->stock - $request->jumlah_barang;
            $barang->stock = $jumlah;
            $barang->save();
        }else {
            Session::flash("flash_notification", [
                "level"=>"Peringatan!",
                "message"=>"Maaf jumlah yang anda minta melebihi persediaan yang ada"
            ]);
        // return redirect()->route('transaksi.index');
        }
        return redirect()->route('transaksi.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::all();
        return view('transaksi.edit',compact('transaksi','barang'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $barang = Barang::findOrFail($request->barang);
        $transaksi = Transaksi::findOrFail($id);
        
        if ($request->jumlah_barang < $barang->stock) {
            $barang = Barang::findOrFail($request->barang);
            $waktu_transaksi = date('d-m-Y H:i:s');
            $transaksi->id_barang = $request->barang;
            $transaksi->jumlah_barang = $request->jumlah_barang;
            $transaksi->total = $request->jumlah_barang * $barang->harga_jual;
            $transaksi->save();
        }else {
            Session::flash("flash_notification", [
                "level"=>"Peringatan!",
                "message"=>"Maaf jumlah yang anda minta melebihi persediaan yang ada"
            ]);
        return redirect()->route('transaksi.index');
        }

        $barang = Barang::findOrFail($request->barang);
        $jumlah=$barang->stock - $request->jumlah_barang;
        $barang->stock = $jumlah;
        $barang->save();
        return redirect()->route('transaksi.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       
        
    }
}
