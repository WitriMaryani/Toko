@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Edit Data Pelanggan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Pelanggan</div>

		<div class="panel-body">
			<form action="{{route('pelanggan.update',$pelanggan->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-lable">Nama Pelanggan</label>
					<input type="text" name="a" value="{{$pelanggan->nama}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</div>
@endsection