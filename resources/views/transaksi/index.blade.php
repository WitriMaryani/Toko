@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Tambah Data Transaksi</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Transaksi</div>

		<div class="panel-body">
			<form action="{{route('transaksi.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
				<label class="control-lable">Nama Barang</label>
				<select class="form-control" name="barang">
					@foreach($barang as $data)
					<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
					@endforeach
				</select>
				</div>
				<div class="form-group">
					<label class="control-lable">Jumlah Barang</label>
					<input type="number" name="jumlah_barang" class="form-control" value="" required="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</div>

	<div class="row">
	<div class="container">
	<center><h1>Data Transaksi</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Transaksi</div>

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
					<!-- <th colspan="3">Action</th> -->
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
					<!-- <td>
						<a class="btn btn-warning" href="transaksi/{{$data->id}}/edit">Edit</a>
					</td> -->
				</tr>
					@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>	
</div>
@endsection