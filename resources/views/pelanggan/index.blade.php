@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Tambah Data Pelanggan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Pelanggan</div>

		<div class="panel-body">
			<form action="{{route('pelanggan.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-lable">Nama Pelanggan</label>
					<input type="text" name="a" class="form-control" required="">
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
	<center><h1>Data Pelanggan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Pelanggan</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama Pelanggan</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
			<tbody>
					@php $no=1; @endphp
					@foreach($pelanggan as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->id}}</td>
					<td>{{$data->nama}}</td>
					<td>
						<a class="btn btn-warning" href="pelanggan/{{$data->id}}/edit">Edit</a>
					</td>
					<td>
						<form action="{{route('pelanggan.destroy',$data->id)}}" method="post">
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
@endsection