@extends('layouts.app')
@section('content')


<div class="row">
<div class="container">
	<center><h1>Edit Data Supplier</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Supplier</div>

		<div class="panel-body">
			<form action="{{route('supplier.update',$supplier->id)}}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label class="control-lable">Nama Supplier</label>
					<input type="text" name="supplier" value="{{$supplier->nama}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">Merk</label>
					<input type="text" name="merk" value="{{$supplier->merk}}" class="form-control" required="">
				</div>
				<div class="form-group">
					<label class="control-lable">No.Hp</label>
					<input type="number" name="no" value="{{$supplier->no_hp}}" class="form-control" required="">
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