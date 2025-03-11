@extends('layouts.dashboard')

@section('title', 'Super Admin Dashboard')

@section('additional_styles')
<style>
    .chart-container {
        position: relative;
        height: 300px;
    }
    .info-box {
        min-height: 100px;
        transition: all 0.3s;
    }
    .info-box:hover {
        transform: translateY(-5px);
    }
    .progress-sm {
        height: 4px;
    }
</style>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Super Admin Dashboard</h1>
        <div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm me-2">
                <i class="fas fa-cog fa-sm text-white-50 me-1"></i> System Settings
            </a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50 me-1"></i> Generate Report
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 stat-card stat-card-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usersCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300 stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 stat-card stat-card-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Roles</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rolesCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-2x text-gray-300 stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 stat-card stat-card-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Permissions
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $permissionsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-key fa-2x text-gray-300 stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 stat-card stat-card-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                System Health</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Optimal</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-server fa-2x text-gray-300 stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">System Management</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary text-white shadow info-box">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fas fa-users fa-3x"></i>
                                        </div>
                                        <div class="col-9">
                                            <div class="small text-white-50">Manage</div>
                                            <div class="font-weight-bold">Users</div>
                                            <a href="{{ route('users.index') }}" class="stretched-link text-white"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-success text-white shadow info-box">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fas fa-user-shield fa-3x"></i>
                                        </div>
                                        <div class="col-9">
                                            <div class="small text-white-50">Manage</div>
                                            <div class="font-weight-bold">Roles</div>
                                            <a href="{{ route('roles.index') }}" class="stretched-link text-white"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-info text-white shadow info-box">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fas fa-key fa-3x"></i>
                                        </div>
                                        <div class="col-9">
                                            <div class="small text-white-50">Manage</div>
                                            <div class="font-weight-bold">Permissions</div>
                                            <a href="{{ route('permissions.index') }}" class="stretched-link text-white"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-warning text-white shadow info-box">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fas fa-cogs fa-3x"></i>
                                        </div>
                                        <div class="col-9">
                                            <div class="small text-white-50">Manage</div>
                                            <div class="font-weight-bold">Settings</div>
                                            <a href="#" class="stretched-link text-white"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">System Metrics</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Usage <span class="float-end">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">Database Size <span class="float-end">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">User Accounts <span class="float-end">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">Memory Usage <span class="float-end">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">Backend Setup <span class="float-end">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">User Registration Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Options:</div>
                            <a class="dropdown-item" href="#">Export Data</a>
                            <a class="dropdown-item" href="#">View Details</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Print Report</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="userRegistrationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">User Role Distribution</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="userRoleChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Activities</h6>
                </div>
                <div class="card-body">
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">1h</div>
                            <div class="timeline-item-marker-indicator bg-primary"></div>
                        </div>
                        <div class="timeline-item-content">
                            <p class="fw-bold mb-2">New user registered</p>
                            <p class="text-muted">User "John Smith" created an account</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">2h</div>
                            <div class="timeline-item-marker-indicator bg-info"></div>
                        </div>
                        <div class="timeline-item-content">
                            <p class="fw-bold mb-2">Permission "create products" added</p>
                            <p class="text-muted">Added to "admin" role</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">1d</div>
                            <div class="timeline-item-marker-indicator bg-warning"></div>
                        </div>
                        <div class="timeline-item-content">
                            <p class="fw-bold mb-2">System update</p>
                            <p class="text-muted">Updated to version 1.2.3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Security Overview</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="fw-bold">System Security</h4>
                            <div class="small text-muted">Last scanned: Today at 12:34 PM</div>
                        </div>
                        <div class="badge bg-success px-3 py-2 rounded-pill">Secure</div>
                    </div>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div>SSL Certificate</div>
                            <i class="fas fa-check-circle text-success"></i>
                        </li>
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div>Database Encryption</div>
                            <i class="fas fa-check-circle text-success"></i>
                        </li>
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div>Failed Login Attempts</div>
                            <span class="badge bg-info">3</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // User Registration Chart
    const userRegistrationChart = document.getElementById('userRegistrationChart').getContext('2d');
    new Chart(userRegistrationChart, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                label: "Users",
                backgroundColor: "rgba(78, 115, 223, 0.8)",
                hoverBackgroundColor: "rgba(78, 115, 223, 1)",
                borderColor: "rgba(78, 115, 223, 1)",
                data: [10, 15, 8, 12, 20, 18],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                },
                y: {
                    grid: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    },
                    ticks: {
                        beginAtZero: true
                    }
                },
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // User Role Distribution Chart
    const userRoleChart = document.getElementById('userRoleChart').getContext('2d');
    new Chart(userRoleChart, {
        type: 'doughnut',
        data: {
            labels: ["Super Admin", "Admin", "User"],
            datasets: [{
                data: [1, 2, 10],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            cutout: '70%',
        },
    });
</script>
<style>
    .timeline-item {
        display: flex;
        margin-bottom: 1rem;
    }
    .timeline-item-marker {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-right: 1rem;
    }
    .timeline-item-marker-text {
        color: #858796;
        font-size: 0.85rem;
        margin-bottom: 0.25rem;
    }
    .timeline-item-marker-indicator {
        height: 1.5rem;
        width: 1.5rem;
        border-radius: 100%;
    }
</style>
@endsection
