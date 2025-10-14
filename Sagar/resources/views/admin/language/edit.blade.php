@include('admin.admin-section.header')
@include('admin.admin-section.sidebar')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.admin-section.navbar')

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Project</h1>
                <a href="{{ route('admin.language.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Update Project</h6>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <form action="{{ route('admin.language.update', $language->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Project Title -->
                                <div class="form-group mb-3">
                                    <label for="title">language Name</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $language->title) }}" placeholder="Enter language title" required>
                                </div>

                                <!-- Project Image -->
                                <div class="form-group mb-3">
                                    <label for="image">Project Image</label>
                                    @if($language->image)
                                    <p>Current Image:</p>
                                    <img src="{{ asset('storage/' . $language->image) }}" alt="language Image" width="120" height="80" style="object-fit: cover; border-radius: 8px;">
                                    @endif
                                    <input type="file" class="form-control mt-2" id="image" name="image">
                                </div>

                                <!-- Project URL -->


                                <!-- Project Description -->
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter project description" required>{{ old('description', $language->description) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Update language</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.admin-section.footer')
</div>