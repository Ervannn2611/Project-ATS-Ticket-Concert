<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Dashboard</title>
  <!-- Bootstrap CSS CDN -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    body {
      font-size: 0.875rem;
    }

    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      padding: 100px 0 0;
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
      width: 250px;
    }

    .sidebar .nav-link {
      font-weight: 500;
      color: #333;
    }

    .sidebar .nav-link:hover {
      color: #007bff;
    }

    .navbar {
      padding: 0.5rem 1rem;
    }

    .main-content {
      margin-left: 250px;
      padding: 2rem;
    }

    /* Ensure the active link is highlighted */
    .active {
      color: #007bff;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar bg-light d-flex flex-column flex-shrink-0 p-3">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/" class="nav-link {{ request()->routeIs('/') ? 'active' : '' }}" aria-current="page">
          <i class="bi bi-house"></i> Home
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.create') }}" class="nav-link">
          <i class="bi bi-speedometer2"></i>Tambah
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="bi bi-table"></i> Data Tiket
        </a>
      </li>
    </ul>
    <hr>
    <!-- Admin Profile -->
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://via.placeholder.com/40" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>User Name</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="left: 0;">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Content will be injected here -->
    @yield('content')
  </div>

  <!-- Bootstrap JS CDN (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
