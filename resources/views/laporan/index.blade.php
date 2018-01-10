@extends('layouts.app')
@section('content')

<div class="row">
	<div class="container">
	<center><h1>Laporan Data Transaksi</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Laporan Data Transaksi</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Waktu Transaksi</th>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
					@php $no=1; @endphp
					@foreach($transaksi as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->id}}</td>
					<td>{{$data->created_at}}</td>
					<td>{{$data->barang->nama}}</td>
					<td>{{$data->jumlah_barang}}</td>
					<td>Rp.{{$data->total}}</td>
				</tr>
					@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>	
</div>

@endsection