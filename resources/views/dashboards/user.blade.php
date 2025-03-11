@extends('layouts.dashboard')

@section('title', 'User Dashboard')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Welcome, {{ $user->name }}!</h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 stat-card stat-card-primary glass-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Appointments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            <div class="mt-2">
                                <a href="#" class="text-decoration-none text-primary">View Details</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 stat-card stat-card-success glass-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Medications</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            <div class="mt-2">
                                <a href="#" class="text-decoration-none text-success">View Details</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pills fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 stat-card stat-card-info glass-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Health Status
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 me-3 font-weight-bold text-gray-800">Good</div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="text-decoration-none text-info">View Details</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 stat-card stat-card-warning glass-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Notifications</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            <div class="mt-2">
                                <a href="#" class="text-decoration-none text-warning">View Details</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bell fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4 glass-card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Upcoming Appointments</h6>
                    <a href="#" class="btn btn-sm btn-primary glass-card">Book New</a>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        You have no upcoming appointments.
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4 glass-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Health Tips</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5>Stay Hydrated</h5>
                        <p>Drink at least 8 glasses of water daily to maintain good health.</p>
                    </div>
                    <div class="mb-3">
                        <h5>Regular Exercise</h5>
                        <p>Aim for at least 30 minutes of moderate exercise each day.</p>
                    </div>
                    <div class="mb-3">
                        <h5>Balanced Diet</h5>
                        <p>Include fruits, vegetables, and whole grains in your daily meals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
