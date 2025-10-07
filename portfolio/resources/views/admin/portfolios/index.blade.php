@extends('admin.layout')

@section('content')
<h3>Portfolios</h3>
<a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary mb-3">Add New</a>

<table class="table table-bordered">
    <thead>
        <tr><th>Name</th><th>DOB</th><th>Address</th><th>Image</th><th>Actions</th></tr>
    </thead>
    <tbody>
        @foreach($portfolios as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->dob }}</td>
            <td>{{ $p->address }}</td>
            <td>@if($p->image)<img src="{{ asset('storage/'.$p->image) }}" width="70">@endif</td>
            <td>
                <a href="{{ route('admin.portfolios.edit',$p) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.portfolios.destroy',$p) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
