@extends('layouts.dashboard')

@section('title', 'User Details')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Profile: {{ $user->name }}</h1>
        <div>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary shadow-sm glass-card me-2">
                <i class="fas fa-edit fa-sm text-white-50 me-1"></i> Edit User
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary shadow-sm glass-card">
                <i class="fas fa-arrow-left fa-sm text-white-50 me-1"></i> Back to Users
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow glass-card mb-4">
                <div class="card-body text-center">
                    <div class="user-avatar mx-auto mb-4" style="width: 100px; height: 100px; font-size: 2.5rem;">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <h5 class="card-title mb-1">{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->email }}</p>
                    <div>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow glass-card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">User Information</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Roles</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if($user->roles->count() > 0)
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No roles assigned</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Permissions</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if($user->getAllPermissions()->count() > 0)
                                @foreach ($user->getAllPermissions() as $permission)
                                    <span class="badge bg-info">{{ $permission->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No permissions assigned</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Created At</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->created_at->format('M d, Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
