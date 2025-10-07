@extends('admin.layout')
@section('content')
<h3>Edit Portfolio</h3>
<form action="{{ route('admin.portfolios.update',$portfolio) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
<div class="mb-3"><label>Name</label><input type="text" name="name" value="{{ $portfolio->name }}" class="form-control"></div>
<div class="mb-3"><label>DOB</label><input type="date" name="dob" value="{{ $portfolio->dob }}" class="form-control"></div>
<div class="mb-3"><label>Address</label><input type="text" name="address" value="{{ $portfolio->address }}" class="form-control"></div>
<div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control"></div>
@if($portfolio->image)<img src="{{ asset('storage/'.$portfolio->image) }}" width="100">@endif
<button class="btn btn-primary mt-3">Update</button>
</form>
@endsection
