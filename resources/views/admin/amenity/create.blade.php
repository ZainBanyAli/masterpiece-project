@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Create Amenity</h1>
            <div class="ml-auto">
                <a href="{{ route('admin_amenity_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_amenity_create_submit') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- SweetAlert for Success Message -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif
@endsection