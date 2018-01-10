@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Tambah Data Pemasukan Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Pemasukan Barang</div>

		<div class="panel-body">
			<form action="{{route('pemasukan.store')}}" method="post">
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
					<label class="control-lable">Nama Supplier</label>
						<select class="form-control" name="supplier">
							@foreach($supplier as $data)
								<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
							@endforeach
						</select>
				</div>
				<div class="form-group">
					<label class="control-lable">Jumlah Barang</label>
					<input type="number" name="jumlah" class="form-control" required="">
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
	<center><h1>Data Pemasukan Barang</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data pemasukan Barang</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Id Pemasukan Barang</th>
					<th>Nama Supplier</th>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
			<tbody>
					@php $no=1; @endphp
					@foreach($pemasukanbarang as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->id}}</td>
					<td>{{$data->supplier->nama}}</td>
					<td>{{$data->barang->nama}}</td>
					<td>{{$data->jumlah}}</td>
					<!-- <td>
						<a class="btn btn-warning" href="pemasukan/{{$data->id}}/edit">Edit</a>
					</td> -->
					<td>
						<form action="{{route('pemasukan.destroy',$data->id)}}" method="post">
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
