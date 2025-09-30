@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quiz</h2>
    <form action="{{ route('user.quiz.submit', $category_id) }}" method="POST">
        @csrf
        @foreach($quizzes as $quiz)
            <div class="card mb-3 p-3">
                <h5>{{ $quiz->question }}</h5>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $quiz->id }}]" value="option_a" class="form-check-input">
                    <label>{{ $quiz->option_a }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $quiz->id }}]" value="option_b" class="form-check-input">
                    <label>{{ $quiz->option_b }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $quiz->id }}]" value="option_c" class="form-check-input">
                    <label>{{ $quiz->option_c }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="answers[{{ $quiz->id }}]" value="option_d" class="form-check-input">
                    <label>{{ $quiz->option_d }}</label>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-success">Submit Quiz</button>
    </form>
</div>
@endsection
