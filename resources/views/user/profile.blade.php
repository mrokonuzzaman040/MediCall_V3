@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Your Profile</h1>
        <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-primary shadow-sm glass-card">
            <i class="fas fa-arrow-left fa-sm text-white-50 me-1"></i> Back to Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show glass-card" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow glass-card">
                <div class="card-body text-center">
                    <div class="user-avatar mx-auto mb-4" style="width: 100px; height: 100px; font-size: 2.5rem;">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <h5 class="card-title mb-1">{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->email }}</p>
                    <p class="mb-0"><span class="badge bg-primary">{{ $user->getRoleNames()->first() }}</span></p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="card shadow glass-card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
                            <small class="text-muted">Required to change password</small>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            <small class="text-muted">Leave blank to keep current password</small>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        
                        <button type="submit" class="btn btn-primary glass-card">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
