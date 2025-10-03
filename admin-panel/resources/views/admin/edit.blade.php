@extends('layouts.app')

@section('content')
    <h1>Edit User: {{ $user->name }}</h1>
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')
        <label>Name: <input type="text" name="name" value="{{ $user->name }}"></label><br>
        <label>Email: <input type="email" name="email" value="{{ $user->email }}"></label><br>
        <label>Role: 
            <select name="role">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </label><br>
        <button type="submit">Update</button>
    </form>
@endsection