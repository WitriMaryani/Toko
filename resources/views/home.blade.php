@extends('layouts.app')

@section('content')

     @role('pemilik')
        <center>
            <div class="panel-body">
                <h1>Selamat Datang Di Tokoku</h1>
            </div>
                <img src="toko.jpg">
         </center>
    @endrole

    @role('karyawan')
        <center>
            <div class="panel-body">
                <h1>Selamat Bekerja</h1>
            </div>
                <img src="toko.jpg">
        </center>
    @endrole

@endsection