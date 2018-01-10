<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemasukanBarang;
use App\Supplier;
use App\Barang;

class PemasukanbarangController extends Controller
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
        $supplier = Supplier::all();
        $pemasukanbarang = PemasukanBarang::all();
        return view('pemasukan.index',compact('pemasukanbarang','supplier','barang'));
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
        $supplier = Supplier::all();
        return view('pemasukan.create',compact('pemasukanbarang','supplier','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $pemasukanbarang = new PemasukanBarang;
        $pemasukanbarang->id_supplier = $request->supplier;
        $pemasukanbarang->id_barang = $request->barang;
        $pemasukanbarang->jumlah = $request->jumlah;
        $pemasukanbarang->save();

        $barang = Barang::findOrFail($request->barang);
        $jumlah=$barang->stock + $request->jumlah;
        $barang->stock = $jumlah;
        $barang->save();
        return redirect()->route('pemasukan.index');
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
        $barang = Barang::all();
        $supplier = Supplier::all();
        $pemasukanbarang = Pemasukanbarang::findOrFail($id);
        return view('pemasukan.edit',compact('pemasukan','supplier','barang'));
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
        // $barang = Barang::all();
        // $supplier = Supplier::all();
        // $pemasukanbarang = Pemasukanbarang::findOrFail($id);
        // $pemasukanbarang->id_supplier = $request->supplier;
        // $pemasukanbarang->id_barang = $request->barang;
        // $pemasukanbarang->jumlah = $request->jumlah;
        // $pemasukanbarang->save();

        // $jumlah=$barang->stock - $pemasukanbarang->jumlah;
        // $barang->stock=$jumlah;
        // $barang->save();
        // return redirect()->route('pemasukan.index');

        $barang = Barang::all();
        $supplier = Supplier::all();
        $pemasukanbarang = Pemasukanbarang::findOrFail($id);
        $pemasukanbarang->id_supplier = $request->supplier;
        $pemasukanbarang->id_barang = $request->barang;
        $pemasukanbarang->jumlah = $request->jumlah;
        $pemasukanbarang->save();

        $barang = Barang::findOrFail($request->barang);
        $jumlah=$barang->stock - $request->jumlah;
        $barang->stock = $jumlah;
        $barang->save();
        return redirect()->route('pemasukan.index');
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
        $barang = Barang::all();
        $supplier = Supplier::all();
        $pemasukanbarang = Pemasukanbarang::findOrFail($id);
        $barang = Barang::findOrFail($pemasukanbarang->id_barang);
        $jumlah=$barang->stock - $pemasukanbarang->jumlah;
        $barang->stock=$jumlah;
        $barang->save();
        $pemasukanbarang->delete();
        return redirect()->route('pemasukan.index');
    }
}
