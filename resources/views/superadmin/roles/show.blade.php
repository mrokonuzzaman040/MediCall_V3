@extends('layouts.dashboard')

@section('title', 'Role Details')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role Details: {{ $role->name }}</h1>
        <div>
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary shadow-sm glass-card me-2">
                <i class="fas fa-edit fa-sm text-white-50 me-1"></i> Edit Role
            </a>
            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary shadow-sm glass-card">
                <i class="fas fa-arrow-left fa-sm text-white-50 me-1"></i> Back to Roles
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow glass-card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Role Summary</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="user-avatar" style="width: 80px; height: 80px; font-size: 2rem; background: linear-gradient(135deg, var(--info-color) 0%, var(--primary-color) 100%);">
                            <i class="fas fa-user-shield" style="line-height: 80px;"></i>
                        </div>
                    </div>
                    <h5 class="text-center mb-2">{{ $role->name }}</h5>
                    <p class="text-muted text-center">Guard: {{ $role->guard_name }}</p>
                    <div class="text-center">
                        <span class="badge bg-info px-3 py-2">{{ $role->permissions->count() }} Permissions</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow glass-card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Assigned Permissions</h6>
                </div>
                <div class="card-body">
                    @if($role->permissions->count() > 0)
                        <div class="row">
                            @foreach($role->permissions as $permission)
                                <div class="col-md-4 mb-2">
                                    <div class="card glass-card">
                                        <div class="card-body py-2 px-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <span>{{ $permission->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            No permissions assigned to this role.
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow glass-card mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold">Users with this Role</h6>
                    <span class="badge bg-primary">{{ $role->users->count() }} Users</span>
                </div>
                <div class="card-body">
                    @if($role->users->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($role->users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No users have been assigned this role.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow glass-card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Audit Information</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Created At:</strong> {{ $role->created_at->format('M d, Y H:i:s') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Updated At:</strong> {{ $role->updated_at->format('M d, Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
