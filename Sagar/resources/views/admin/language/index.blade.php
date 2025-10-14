@include('admin.admin-section.header')
@include('admin.admin-section.sidebar')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.admin-section.navbar')

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Projects</h1>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row">
                <!-- Create Form -->
                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Project</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.language.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Language Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Image (optional)</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Project List -->
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                           
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($languages as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>
                                                @if($project->image)
                                                <img src="{{ asset('storage/'.$project->image) }}" width="60" height="60" style="object-fit: cover;" alt="">
                                                @endif
                                            </td>
                                           
                                            <td>{{ Str::limit($project->description, 50) }}</td>
                                            <td>
                                                <a href="{{ route('admin.language.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.language.destroy', $project->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                        @if($languages->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">No language found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.admin-section.footer')
</div>