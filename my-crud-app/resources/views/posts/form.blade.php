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
