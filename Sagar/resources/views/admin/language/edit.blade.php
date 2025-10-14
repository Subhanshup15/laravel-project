@include('admin.admin-section.header')
@include('admin.admin-section.sidebar')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.admin-section.navbar')

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Language</h1>
                <a href="{{ route('admin.language.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Update Language</h6>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <form action="{{ route('admin.language.update', $language->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Language Name -->
                                <div class="form-group mb-3">
                                    <label for="name">Language Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        id="name" 
                                        name="name"
                                        value="{{ old('name', $language->name) }}" 
                                        placeholder="Enter language name" 
                                        required
                                    >
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Language Image -->
                                <div class="form-group mb-3">
                                    <label for="image">Language Image</label>
                                    @if($language->image)
                                        <p>Current Image:</p>
                                        <img src="{{ asset('storage/' . $language->image) }}" alt="Language Image" width="120" height="80" style="object-fit: cover; border-radius: 8px;">
                                    @endif
                                    <input 
                                        type="file" 
                                        class="form-control mt-2 @error('image') is-invalid @enderror" 
                                        id="image" 
                                        name="image"
                                    >
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea 
                                        class="form-control @error('description') is-invalid @enderror" 
                                        id="description" 
                                        name="description" 
                                        rows="4" 
                                        placeholder="Enter language description" 
                                        required
                                    >{{ old('description', $language->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update Language</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.admin-section.footer')
</div>
