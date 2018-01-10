@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Edit Data Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Barang</div>

		<div class="panel-body">
			<form action="{{route('barang.update',$barang->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-lable">Nama Barang</label>
					<input type="text" name="nama" value="{{$barang->nama}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Stock</label>
					<input type="number" name="stock" value="{{$barang->stock}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Harga Jual</label>
					<input type="number" name="jual" value="{{$barang->harga_jual}}" class="form-control" required="">
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