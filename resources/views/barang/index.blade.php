@extends('layouts.app')
@section('content')

<div class="row">
<div class="container">
	<center><h1>Tambah Data Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Barang</div>

		<div class="panel-body">
			<form action="{{route('barang.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-lable">Nama Barang</label>
					<input type="text" name="nama" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Stock</label>
					<input type="number" name="stock" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Harga Jual</label>
					<input type="number" name="jual" class="form-control" required="">
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
	<center><h1>Data Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Barang</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama Barang</th>
					<th>Stock</th>
					<th>Harga Jual</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
			<tbody>
					@php $no=1; @endphp
					@foreach($barang as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->id}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->stock}}</td>
					<td>Rp.{{$data->harga_jual}}</td>
					<td>
						<a class="btn btn-warning" href="barang/{{$data->id}}/edit">Edit</a>
					</td>
					<td>
						<form action="{{route('barang.destroy',$data->id)}}" method="post">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token">
							<input class="btn btn-danger" type="submit" value="Delete">
							{{csrf_field()}}
						</form>
					</td>
				</tr>
					@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>	
</div>
</body>
@endsection