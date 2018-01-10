@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Edit Data Pemasukan Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Pemasukan Barang</div>

		<div class="panel-body">
			<form action="{{route('pemasukan.update',$pemasukan->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-lable">Nama Barang</label>
						<select class="form-control" name="barang">
							@foreach($barang as $data)
								<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
							@endforeach
						</select>
				</div>
				<div class="form-group">
					<label class="control-lable">Nama Supplier</label>
						<select class="form-control" name="supplier">
							@foreach($supplier as $data)
								<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
							@endforeach
						</select>
				</div>
				<div class="form-group">
					<label class="control-lable">Jumlah Barang</label>
					<input type="number" name="jumlah" value="{{$pemasukanbarang->jumlah}}" class="form-control" required="">
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