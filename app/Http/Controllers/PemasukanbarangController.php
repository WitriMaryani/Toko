<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukanbarang;

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
        $pemasukan = Pemasukanbarang::all();
        return view('pemasukan.index',compact('pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pemasukan.create');
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
        $pemasukan = new Pemasukanbarang;
        $pemasukan->nama = $request->a;
        $pemasukan->save();
        return redirect('pemasukan');
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
        $pemasukan = Pemasukanbarang::findOrFail($id);
        return view('pemasukan.edit',compact('pemasukan'));
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
        $pemasukan = Pemasukanbarang::findOrFail($id);
        $pemasukan->nama = $request->a;
        $pemasukan->save();
        return redirect('pemasukan');
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
        $pemasukan = Pemasukanbarang::findOrFail($id);
        $pemasukan->delete();
        return redirect('pemasukan');
    }
}
