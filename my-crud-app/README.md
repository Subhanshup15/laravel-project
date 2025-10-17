STEP 1:composer create-project --prefer-dist laravel/laravel:^11.0 my-crud-app



STEP 2: cd my-crud-app


STEP 3: php artisan serve


STEP 4:Configure .env (database) Edit .env to match your DB credentials. Example (MySQL)


STEP 5:Generate model + migration + factory + resource controller
       ==>php artisan make:model Post -m -f -c --resource
       // database/migrations/xxxx_xx_xx_create_posts_table.php
        public function up()
        {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('body');
                $table->timestamps();
            });
        }
      USE THIS MIGRATION 


STEP 6:php artisan migrate


STEP 7:Model: fillable & casts Edit app/Models/Post.php: <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];
}



STEP 8:Factory & Seeder (optional sample data)
Factory (database/factories/PostFactory.php) 

public function definition()
{
    return [
        'title' => $this->faker->sentence,
        'body' => $this->faker->paragraphs(3, true),
    ];
}




STEP 9:Seeder: php artisan make:seeder PostSeeder and inside:
Seeder: php artisan make:seeder PostSeeder and inside:


STEP 10:Register in DatabaseSeeder.php
$this->call(PostSeeder::class);


STEP 11:php artisan db:seed


STEP 12:Controller: implement resource methods with validation Open app/Http/Controllers/PostController.php and implement:
<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}



STEP 13:Routes (web) 
         Add resource routes to routes/web.php:
         use App\Http\Controllers\PostController;
Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::resource('posts', PostController::class);


STEP 14:Blade Views (simple Bootstrap-based)
Create resources/views/layouts/app.blade.php

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'My CRUD')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
  </div>
</body>
</html>



STEP 15:Index: resources/views/posts/index.blade.php
@extends('layouts.app')
@section('title', 'Posts')
@section('content')
  <div class="d-flex justify-content-between mb-3">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
  </div>

  @if($posts->count())
    <table class="table table-bordered">
      <thead><tr><th>ID</th><th>Title</th><th>Created</th><th>Actions</th></tr></thead>
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




STEP 16:Create/Edit form partial resources/views/posts/form.blade.php
@csrf
<div class="mb-3">
  <label class="form-label">Title</label>
  <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="form-control">
  @error('title') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Body</label>
  <textarea name="body" rows="6" class="form-control">{{ old('body', $post->body ?? '') }}</textarea>
  @error('body') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<button class="btn btn-primary" type="submit">Save</button>
<a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>



STEP 17:Create view resources/views/posts/create.blade.php
@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
  <h1>Create Post</h1>
  <form action="{{ route('posts.store') }}" method="POST">
    @include('posts.form')
  </form>
@endsection



STEP 18:Edit view resources/views/posts/edit.blade.php
@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')
  <h1>Edit Post</h1>
  <form action="{{ route('posts.update', $post) }}" method="POST">
    @method('PUT')
    @include('posts.form')
  </form>
@endsection




STEP 19:Show view resources/views/posts/show.blade.php
@extends('layouts.app')
@section('content')
  <h1>{{ $post->title }}</h1>
  <p>{{ $post->body }}</p>
  <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
@endsection



STEP 20:API endpoints (optional)
          If you prefer an API instead of Blade views, add an API resource controller:
use App\Http\Controllers\Api\PostApiController;
Route::apiResource('posts', PostApiController::class);

