@include('layouts.admin-section.header')
@include('layouts.admin-section.sidebar')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('layouts.admin-section.navbar')

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit About Me</h1>
                <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Update About Me</h6>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                        value="{{ old('name', $about->name) }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" 
                                        value="{{ old('designation', $about->designation) }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="about_myself">About Myself</label>
                                    <textarea class="form-control" id="about_myself" name="about_myself" rows="4" required>{{ old('about_myself', $about->about_myself) }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="experience">Experience (Years)</label>
                                    <input type="number" class="form-control" id="experience" name="experience" 
                                        value="{{ old('experience', $about->experience) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" 
                                        value="{{ old('phone', $about->phone) }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('layouts.admin-section.footer')
</div>
