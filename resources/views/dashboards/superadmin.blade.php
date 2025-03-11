<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1>Super Admin Dashboard</h1>
                <p>Welcome, {{ auth()->user()->name }}!</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text display-4">{{ $usersCount }}</p>
                        <a href="#" class="text-white">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Roles</h5>
                        <p class="card-text display-4">{{ $rolesCount }}</p>
                        <a href="#" class="text-white">Manage Roles</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Permissions</h5>
                        <p class="card-text display-4">{{ $permissionsCount }}</p>
                        <a href="#" class="text-white">Manage Permissions</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>System Management</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">User Management</a>
                            <a href="#" class="list-group-item list-group-item-action">Role Management</a>
                            <a href="#" class="list-group-item list-group-item-action">Permission Management</a>
                            <a href="#" class="list-group-item list-group-item-action">System Settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
