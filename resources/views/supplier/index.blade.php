@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Tambah Data Supplier</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Supplier</div>

		<div class="panel-body">
			<form action="{{route('supplier.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-lable">Nama Supplier</label>
					<input type="text" name="supplier" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Merk</label>
					<input type="text" name="merk" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">No.Telpon</label>
					<input type="number" name="no" class="form-control" required="">
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
	<center><h1>Data Supplier</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Supplier</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama Supplier</th>
					<th>Merk</th>
					<th>No.Telpon</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
			<tbody>
					@php $no=1; @endphp
					@foreach($supplier as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->id}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->merk}}</td>
					<td>{{$data->no_hp}}</td>
					<td>
						<a class="btn btn-warning" href="supplier/{{$data->id}}/edit">Edit</a>
					</td>
					<td>
						<form action="{{route('supplier.destroy',$data->id)}}" method="post">
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