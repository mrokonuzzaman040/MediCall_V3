<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1>Admin Dashboard</h1>
                <p>Welcome, {{ auth()->user()->name }}!</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text display-4">{{ $usersCount }}</p>
                        <a href="{{ route('admin.users') }}" class="text-white">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Activities</h5>
                        <p class="card-text">Recent activities in the system</p>
                        <a href="#" class="text-white">View All Activities</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Administrative Tools</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">User Management</a>
                            <a href="#" class="list-group-item list-group-item-action">System Reports</a>
                            <a href="#" class="list-group-item list-group-item-action">Settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
