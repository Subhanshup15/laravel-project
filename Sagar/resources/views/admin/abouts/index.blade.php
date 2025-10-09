      @include('layouts.admin-section.header')

        @include('layouts.admin-section.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('layouts.admin-section.navbar')
                <div class="container-fluid">
                    @yield('content')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">About</h1>
                        <a>User Email :{{ Auth::user()->email }}</a>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add About Me</h6>
                                    <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.abouts.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="designation">Designation</label>
                                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="about_myself">About Myself</label>
                                            <textarea class="form-control" id="about_myself" name="about_myself" rows="4" placeholder="Write something about yourself" required></textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="experience">Experience (Years)</label>
                                            <input type="number" class="form-control" id="experience" name="experience" placeholder="Enter Years of Experience">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($abouts as $about)
                                                <tr>
                                                    <td>{{ $about->id }}</td>
                                                    <td>{{ $about->name }}</td>
                                                    <td>{{ $about->designation }}</td>
                                                    <td>{{ $about->experience }}</td>
                                                    <td>{{ $about->phone }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.admin-section.footer')
        </div>
    </div>


