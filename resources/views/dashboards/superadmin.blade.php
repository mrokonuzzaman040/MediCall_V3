@extends('layouts.dashboard')

@section('title', 'Super Admin Dashboard')

@section('additional_styles')
<style>
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --info: #4895ef;
        --warning: #f72585;
        --danger: #e63946;
        --light: #f8f9fa;
        --dark: #212529;
    }
    
    .chart-container {
        position: relative;
        height: 300px;
    }
    
    /* Glassy UI Effects */
    .glass-card {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        border-radius: 10px;
        transition: all 0.3s;
    }
    
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px 0 rgba(31, 38, 135, 0.25);
    }
    
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        background-attachment: fixed;
    }
    
    .content-wrapper {
        background: transparent;
    }
    
    .stat-card {
        border-radius: 10px;
        overflow: hidden;
        border-left: none;
        position: relative;
    }
    
    .stat-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
    }
    
    .stat-card-primary::before {
        background-color: var(--primary);
    }
    
    .stat-card-success::before {
        background-color: var(--success);
    }
    
    .stat-card-info::before {
        background-color: var(--info);
    }
    
    .stat-card-warning::before {
        background-color: var(--warning);
    }
    
    .stat-card-danger::before {
        background-color: var(--danger);
    }
    
    .management-card {
        height: 100%;
        transition: all 0.3s;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        overflow: hidden;
    }
    
    .management-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .management-card .card-body {
        z-index: 1;
        position: relative;
    }
    
    .management-card::after {
        content: "";
        position: absolute;
        bottom: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        z-index: 0;
    }
    
    .card-header {
        background: rgba(255, 255, 255, 0.2);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-weight: 600;
        color: var(--dark);
    }
    
    .progress {
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    .topbar {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    .timeline-item-marker-indicator {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .user-type-icon {
        font-size: 3rem;
        opacity: 0.8;
        margin-bottom: 1rem;
    }
    
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
    
    .badge {
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
    }
</style>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Super Admin Dashboard</h1>
        <div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm me-2 glass-card">
                <i class="fas fa-cog fa-sm text-white-50 me-1"></i> System Settings
            </a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm glass-card">
                <i class="fas fa-download fa-sm text-white-50 me-1"></i> Generate Report
            </a>
        </div>
    </div>

    <!-- Summary Stats Cards Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 stat-card stat-card-primary glass-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usersCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                Hospitals</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital fa-2x text-gray-300"></i>
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
                                Roles
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rolesCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-2x text-gray-300"></i>
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
                                Permissions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $permissionsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-key fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Management Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow glass-card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">User Management</h6>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">View All Users</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Patients Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card management-card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-injured user-type-icon text-primary"></i>
                                    <h5 class="card-title">Patients</h5>
                                    <p class="card-text">Manage patient accounts and medical records</p>
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-sm glass-card">Manage Patients</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Admins Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card management-card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-tie user-type-icon text-info"></i>
                                    <h5 class="card-title">Admins</h5>
                                    <p class="card-text">Manage administrator accounts and permissions</p>
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-info btn-sm glass-card">Manage Admins</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hospitals Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card management-card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-hospital-alt user-type-icon text-success"></i>
                                    <h5 class="card-title">Hospitals</h5>
                                    <p class="card-text">Manage hospital profiles and facilities</p>
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-success btn-sm glass-card">Manage Hospitals</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hospital Staff Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card management-card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-md user-type-icon text-warning"></i>
                                    <h5 class="card-title">Hospital Staff</h5>
                                    <p class="card-text">Manage medical staff and healthcare providers</p>
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-warning btn-sm glass-card">Manage Staff</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Managers Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card management-card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-tasks user-type-icon text-primary"></i>
                                    <h5 class="card-title">Managers</h5>
                                    <p class="card-text">Manage operations managers and coordinators</p>
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary btn-sm glass-card">Manage Managers</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riders Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card management-card shadow h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-motorcycle user-type-icon text-danger"></i>
                                    <h5 class="card-title">Riders</h5>
                                    <p class="card-text">Manage delivery riders and logistics</p>
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-danger btn-sm glass-card">Manage Riders</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4 glass-card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">User Registration Overview</h6>
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
            <div class="card shadow mb-4 glass-card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">User Distribution</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="userRoleChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status Row -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4 glass-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Recent Activities</h6>
                </div>
                <div class="card-body">
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">1h</div>
                            <div class="timeline-item-marker-indicator bg-primary"></div>
                        </div>
                        <div class="timeline-item-content">
                            <p class="fw-bold mb-2">New hospital registered</p>
                            <p class="text-muted">City General Hospital added to the system</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">2h</div>
                            <div class="timeline-item-marker-indicator bg-success"></div>
                        </div>
                        <div class="timeline-item-content">
                            <p class="fw-bold mb-2">New doctor added</p>
                            <p class="text-muted">Dr. Sarah Johnson joined City General Hospital</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">5h</div>
                            <div class="timeline-item-marker-indicator bg-info"></div>
                        </div>
                        <div class="timeline-item-content">
                            <p class="fw-bold mb-2">User role updated</p>
                            <p class="text-muted">John Smith promoted to Hospital Manager</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">1d</div>
                            <div class="timeline-item-marker-indicator bg-warning"></div>
                        </div>
                        <div class="timeline-item-content">
                            <p class="fw-bold mb-2">System update</p>
                            <p class="text-muted">Successfully upgraded to version 3.1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4 glass-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">System Status</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="fw-bold">System Health</h4>
                            <div class="small text-muted">Last checked: Today at {{ now()->format('h:i A') }}</div>
                        </div>
                        <div class="badge bg-success px-3 py-2 rounded-pill">Optimal</div>
                    </div>
                    <h4 class="small font-weight-bold">Server Load <span class="float-end">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">Database Usage <span class="float-end">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">Storage Capacity <span class="float-end">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">Network Traffic <span class="float-end">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                    <h4 class="small font-weight-bold">API Health <span class="float-end">100%</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
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
                label: "User Registrations",
                backgroundColor: "rgba(67, 97, 238, 0.7)",
                hoverBackgroundColor: "rgba(67, 97, 238, 1)",
                borderColor: "rgba(67, 97, 238, 1)",
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
                        color: "rgba(255, 255, 255, 0.1)",
                        zeroLineColor: "rgba(255, 255, 255, 0.1)",
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

    // User Distribution Chart
    const userRoleChart = document.getElementById('userRoleChart').getContext('2d');
    new Chart(userRoleChart, {
        type: 'doughnut',
        data: {
            labels: ["Patients", "Hospital Staff", "Admins", "Managers", "Riders", "Super Admin"],
            datasets: [{
                data: [65, 15, 8, 5, 6, 1],
                backgroundColor: [
                    'rgba(67, 97, 238, 0.7)',
                    'rgba(76, 201, 240, 0.7)',
                    'rgba(72, 149, 239, 0.7)',
                    'rgba(247, 37, 133, 0.7)',
                    'rgba(63, 55, 201, 0.7)',
                    'rgba(58, 12, 163, 0.7)'
                ],
                hoverBackgroundColor: [
                    'rgba(67, 97, 238, 1)',
                    'rgba(76, 201, 240, 1)',
                    'rgba(72, 149, 239, 1)',
                    'rgba(247, 37, 133, 1)',
                    'rgba(63, 55, 201, 1)',
                    'rgba(58, 12, 163, 1)'
                ],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        color: 'rgba(0, 0, 0, 0.7)'
                    }
                }
            },
            cutout: '70%',
        },
    });
</script>
@endsection
