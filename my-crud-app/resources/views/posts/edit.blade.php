@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
  <h1>Edit Post</h1>
  <form action="{{ route('posts.update', $post) }}" method="POST">
    @method('PUT')
    @include('posts.form')
  </form>
@endsection
