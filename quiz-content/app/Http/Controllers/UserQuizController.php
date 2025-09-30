<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizController extends Controller
{
    public function dashboard() {
        $categories = Category::all();
        return view('user.dashboard', compact('categories'));
    }

    public function startQuiz($category_id) {
        $quizzes = Quiz::where('category_id', $category_id)->get();
        return view('user.quiz', compact('quizzes','category_id'));
    }

    public function submitQuiz(Request $request, $category_id) {
        $score = 0;
        $quizzes = Quiz::where('category_id', $category_id)->get();

        foreach($quizzes as $quiz){
            if(isset($request->answers[$quiz->id]) && $request->answers[$quiz->id] == $quiz->correct_answer){
                $score++;
            }
        }

        Result::create([
            'user_id' => Auth::id(),
            'category_id' => $category_id,
            'score' => $score,
            'total_questions' => count($quizzes),
        ]);

        return redirect()->route('dashboard')->with('success', 'Quiz submitted! Score: '.$score);
    }
}
