@extends('layouts.dashboard')

@section('title', 'Create Permission')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Permission</h1>
        <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary shadow-sm glass-card">
            <i class="fas fa-arrow-left fa-sm text-white-50 me-1"></i> Back to Permissions
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow glass-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Permission Information</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            <small class="text-muted">Enter a descriptive name like "edit users" or "create posts"</small>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary glass-card">Create Permission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
