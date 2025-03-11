@extends('layouts.dashboard')

@section('title', 'Create Role')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Role</h1>
        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary shadow-sm glass-card">
            <i class="fas fa-arrow-left fa-sm text-white-50 me-1"></i> Back to Roles
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow glass-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Role Information</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Assign Permissions</label>
                            <div class="card glass-card">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                                                    <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @error('permissions')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary glass-card">Create Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
