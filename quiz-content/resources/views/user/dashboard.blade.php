@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Dashboard </h2>
        <div>
            {{ Auth::user()->name }} | {{ now()->format('H:i:s') }}
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>Choose Quiz Category:</h4>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h5>{{ $category->name }}</h5>
                <a href="{{ route('user.quiz', $category->id) }}" class="btn btn-primary btn-sm mt-2">Start Quiz</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Select a Quiz Category</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <a href="{{ route('user.quiz', $category->id) }}" class="block bg-white dark:bg-gray-800 shadow rounded-lg p-5 transform hover:scale-105 transition">
            <div class="flex flex-col justify-between h-full">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">{{ $category->name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Click to start this quiz</p>
                <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Start Quiz</button>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection


