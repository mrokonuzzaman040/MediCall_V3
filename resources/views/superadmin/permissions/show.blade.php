@extends('layouts.dashboard')

@section('title', 'Permission Details')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permission Details: {{ $permission->name }}</h1>
        <div>
            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary shadow-sm glass-card me-2">
                <i class="fas fa-edit fa-sm text-white-50 me-1"></i> Edit Permission
            </a>
            <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary shadow-sm glass-card">
                <i class="fas fa-arrow-left fa-sm text-white-50 me-1"></i> Back to Permissions
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow glass-card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Permission Summary</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="user-avatar" style="width: 80px; height: 80px; font-size: 2rem; background: linear-gradient(135deg, var(--info-color) 0%, var(--warning-color) 100%);">
                            <i class="fas fa-key" style="line-height: 80px;"></i>
                        </div>
                    </div>
                    <h5 class="text-center mb-2">{{ $permission->name }}</h5>
                    <p class="text-muted text-center">Guard: {{ $permission->guard_name }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow glass-card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Roles with this Permission</h6>
                </div>
                <div class="card-body">
                    @if($permission->roles->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permission->roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-info">View Role</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No roles have been assigned this permission.
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow glass-card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Users with this Permission</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        Users inherit this permission through the roles they are assigned.
                    </div>
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
                    <p><strong>Created At:</strong> {{ $permission->created_at->format('M d, Y H:i:s') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Updated At:</strong> {{ $permission->updated_at->format('M d, Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
