@extends('admin.layout')
@section('content')
<h3>Add Portfolio</h3>
<form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control"></div>
<div class="mb-3"><label>DOB</label><input type="date" name="dob" class="form-control"></div>
<div class="mb-3"><label>Address</label><input type="text" name="address" class="form-control"></div>
<div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control"></div>
<button class="btn btn-success">Save</button>
</form>
@endsection
