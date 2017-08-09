@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Edit Data Karyawan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Karyawan</div>

		<div class="panel-body">
			<form action="{{route('karyawan.update',$karyawan->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-lable">Nama Karyawan</label>
					<input type="text" name="a" value="{{$karyawan->nama}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Jenis Kelamin</label><br>
					<input name="b" type="radio" value="{{$karyawan->jk}}" checked="">Laki-laki<br>
					<input name="b" type="radio" value="{{$karyawan->jk}}" checked="">Perempuan
				</div>
				<div class="form-group">
					<label class="control-lable">Alamat</label>
					<textarea class="form-control" rows="5" name="c" required="">{{$karyawan->alamat}}</textarea>
				</div>
				<div class="form-group">
					<label class="control-lable">Email</label>
					<input type="text" name="d" value="{{$karyawan->email}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</div>
