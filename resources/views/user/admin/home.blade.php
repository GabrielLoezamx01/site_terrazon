<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ config('app.version')}}">

    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
        }
        .content {
            padding: 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: auto;
                z-index: 1000;
                transition: transform 0.3s ease;
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('custom.home') }}">Mi cuenta</a></li>
        </ol>
    </nav>

    <div class="row h-100">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar d-none d-md-block">
            <!-- Sidebar content here -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Menu Item 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menu Item 2</a>
                </li>
                <!-- Add more menu items here -->
            </ul>
        </div>

        <!-- Main content -->
        <div class="col-md-9 content">
            <!-- Main content here -->
            <div class="d-md-none">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
                    Toggle Sidebar
                </button>
            </div>
            <!-- Add your content here -->
        </div>
    </div>
</div>

<!-- Sidebar for mobile -->
<div class="collapse sidebar d-md-none" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="#">Menu Item 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Menu Item 2</a>
        </li>
        <!-- Add more menu items here -->
    </ul>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
