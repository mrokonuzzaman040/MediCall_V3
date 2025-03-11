@extends('layouts.dashboard')

@section('title', 'Permission Management')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permission Management</h1>
        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary shadow-sm glass-card">
            <i class="fas fa-plus fa-sm text-white-50 me-1"></i> Create New Permission
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show glass-card" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow glass-card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">All Permissions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Guard</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-sm btn-info">View</a>
                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this permission?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
