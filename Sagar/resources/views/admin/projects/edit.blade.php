@include('admin.admin-section.header')
@include('admin.admin-section.sidebar')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('layouts.admin-section.navbar')

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Project</h1>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
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
                            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Project Title -->
                                <div class="form-group mb-3">
                                    <label for="title">Project Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $project->title) }}" placeholder="Enter project title" required>
                                </div>

                                <!-- Project Image -->
                                <div class="form-group mb-3">
                                    <label for="image">Project Image</label>
                                    @if($project->image)
                                        <p>Current Image:</p>
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" width="120" height="80" style="object-fit: cover; border-radius: 8px;">
                                    @endif
                                    <input type="file" class="form-control mt-2" id="image" name="image">
                                </div>

                                <!-- Project URL -->
                                <div class="form-group mb-3">
                                    <label for="url">Project URL</label>
                                    <input type="url" class="form-control" id="url" name="url"
                                        value="{{ old('url', $project->url) }}" placeholder="https://example.com" required>
                                </div>

                                <!-- Project Description -->
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter project description" required>{{ old('description', $project->description) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.admin-section.footer')
</div>
