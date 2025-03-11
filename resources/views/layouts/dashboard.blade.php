<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - MediCall</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
            overflow-x: hidden;
        }
        
        .sidebar {
            min-height: 100vh;
            width: 250px;
            background: linear-gradient(180deg, var(--primary-color) 10%, #224abe 100%);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            transition: all 0.3s;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .sidebar-brand {
            height: 4.375rem;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 700;
            padding: 1.5rem 1rem;
            text-align: center;
            letter-spacing: 0.05rem;
            color: white;
            display: flex;
            align-items: center;
        }
        
        .sidebar-brand i {
            font-size: 2rem;
            margin-right: 10px;
        }
        
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin: 0 1rem 1rem;
        }
        
        .nav-item {
            position: relative;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
        }
        
        .nav-link i {
            margin-right: 0.5rem;
            font-size: 1rem;
            width: 1.5rem;
            text-align: center;
        }
        
        .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link.active {
            color: #fff;
            font-weight: 700;
        }
        
        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }
        
        .topbar {
            height: 4.375rem;
            background-color: #fff;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 99;
        }
        
        .user-dropdown {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 8px;
        }
        
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.25rem;
            font-weight: 700;
            font-size: 1rem;
            color: var(--primary-color);
        }
        
        .stat-card {
            border-left: 4px solid;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            position: relative;
            transition: transform 0.2s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card-primary {
            border-left-color: var(--primary-color);
        }
        
        .stat-card-success {
            border-left-color: var(--success-color);
        }
        
        .stat-card-info {
            border-left-color: var(--info-color);
        }
        
        .stat-card-warning {
            border-left-color: var(--warning-color);
        }
        
        .stat-icon {
            font-size: 2rem;
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.3;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            
            .content-wrapper {
                margin-left: 0;
            }
            
            .sidebar.show {
                margin-left: 0;
            }
            
            .content-wrapper.active {
                margin-left: 250px;
            }
        }
    </style>
    @yield('additional_styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <i class="fas fa-heartbeat"></i>
            <span>MediCall</span>
        </a>
        
        <hr class="sidebar-divider">
        
        <ul class="nav flex-column">
            @if(auth()->user()->hasRole('super_admin'))
                <li class="nav-item">
                    <a href="{{ route('superadmin.dashboard') }}" class="nav-link {{ request()->is('superadmin/dashboard') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('superadmin/users*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('superadmin/roles*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-user-shield"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->is('superadmin/permissions*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-key"></i>
                        <span>Permissions</span>
                    </a>
                </li>
            @elseif(auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile') }}" class="nav-link {{ request()->is('user/profile') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
            @endif
            
            <hr class="sidebar-divider">
            
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper" id="content-wrapper">
        <!-- Topbar -->
        <div class="topbar">
            <button class="btn btn-link d-md-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="user-dropdown">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle text-decoration-none text-dark" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();">
                                Logout
                            </a>
                            <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('content-wrapper').classList.toggle('active');
        });

        // Add active class to current nav item
        document.addEventListener('DOMContentLoaded', function() {
            const currentLocation = location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentLocation) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
