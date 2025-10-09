@include('admin.admin-section.header')
@include('admin.admin-section.sidebar')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.admin-section.navbar')

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">About Me</h1>
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
                <!-- About List Table -->


                <!-- Create Form (Moved Below) -->
                <div class="col-lg-12 mx-auto">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add / Update About Me</h6>
                        </div>
                        <div class="card-body">


                            <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Designation</label>
                                            <input type="text" name="designation" class="form-control" placeholder="Enter Designation" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>About Myself</label>
                                            <textarea name="about_myself" class="form-control" rows="3" placeholder="Write about yourself" required></textarea>
                                        </div>

                                    </div>
                                    <div class="col-6 ">
                                        <div class="form-group mb-3">
                                            <label>Description</label>
                                            <textarea name="about" class="form-control" rows="3" placeholder="Description" required></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Experience (Years)</label>
                                            <input type="number" name="experience" class="form-control" placeholder="Enter Experience">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>PDF</label>
                                            <input type="file" name="pdf" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">About List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Experience</th>
                                            <th>Phone</th>
                                            <th>PDF</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($services as $about)
                                        <tr>
                                            <td>{{ $about->id }}</td>
                                            <td>{{ $about->name }}</td>
                                            <td>{{ $about->designation }}</td>
                                            <td>{{ $about->experience }}</td>
                                            <td>{{ $about->phone }}</td>
                                            <td>
                                                @if($about->pdf)
                                                <a href="{{ asset('storage/'.$about->pdf) }}" target="_blank" class="btn btn-info btn-sm">View PDF</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No records found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- /.container-fluid -->
    </div>

    @include('admin.admin-section.footer')
</div>