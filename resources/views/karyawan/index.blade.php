@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Tambah Data Karyawan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Karyawan</div>

		<div class="panel-body">
			<form action="{{route('karyawan.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-lable">Nama Karyawan</label>
					<input type="text" name="a" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Jenis Kelamin</label><br>
					<input name="b" type="radio" value="laki-laki">Laki-laki&nbsp&nbsp
					<input name="b" type="radio" value="perempuan">Perempuan
				</div>
				<div class="form-group">
					<label class="control-lable">Alamat</label>
					<textarea class="form-control" rows="5" name="c" required=""></textarea>
				</div>
				<div class="form-group">
					<label class="control-lable">Email</label>
					<input type="text" name="d" class="form-control" required="">
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
	<center><h1>Data Karyawan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Karyawan</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama Karyawan</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Email</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
			<tbody>
					@php $no=1; @endphp
					@foreach($karyawan as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->id}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->jk}}</td>
					<td>{{$data->alamat}}</td>
					<td>{{$data->email}}</td>
					<td>
						<a class="btn btn-warning" href="/karyawan/{{$data->id}}/edit">Edit</a>
					</td>
					<td>
						<form action="{{route('karyawan.destroy',$data->id)}}" method="post">
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