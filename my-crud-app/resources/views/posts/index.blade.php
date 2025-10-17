@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h1>Posts</h1>
  <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
</div>

@if($posts->count())
<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <td>{{ $post->id }}</td>
      <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
      <td>{{ $post->created_at->format('Y-m-d') }}</td>
      <td>
        <a class="btn btn-sm btn-secondary" href="{{ route('posts.edit', $post) }}">Edit</a>

        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline">
          @csrf
          @method('DELETE')
          <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $posts->links() }}
@else
<p>No posts yet.</p>
@endif
@endsection