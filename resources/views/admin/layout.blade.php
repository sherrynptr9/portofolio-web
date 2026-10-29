<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Sherrynita Portfolio</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8F9FA;
            color: #333;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: #1A1C23;
            color: #E2E8F0;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
        }

        .sidebar-brand {
            padding: 22px 20px;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: #FFFFFF;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-menu {
            padding: 15px 12px;
            flex: 1;
            overflow-y: auto;
        }

        .menu-header {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #718096;
            padding: 10px 14px 4px;
            font-weight: 700;
        }

        .nav-item-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: #A0AEC0;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.15s ease;
            margin-bottom: 3px;
        }

        .nav-item-link:hover {
            color: #FFFFFF;
            background-color: rgba(255, 255, 255, 0.06);
        }

        .nav-item-link.active {
            color: #FFFFFF;
            background-color: #953335;
        }

        .nav-item-link i {
            width: 18px;
            text-align: center;
            font-size: 14px;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            min-height: 100vh;
        }

        .admin-card {
            background: #FFFFFF;
            border-radius: 12px;
            border: 1px solid #E2E8F0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
            padding: 24px;
            margin-bottom: 24px;
        }

        .table th {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #718096;
            font-weight: 600;
            background-color: #F8FAFC;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-shapes text-warning"></i>
            <span>Sherrynita CMS</span>
        </div>

        <div class="sidebar-menu">
            <div class="menu-header">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.profile.index') }}" class="nav-item-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                <i class="fas fa-user-gear"></i>
                <span>Profile & Biography</span>
            </a>

            <div class="menu-header mt-3">Portfolio Sections</div>
            <a href="{{ route('admin.education.index') }}" class="nav-item-link {{ request()->routeIs('admin.education.*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i>
                <span>Education</span>
            </a>
            <a href="{{ route('admin.skill.index') }}" class="nav-item-link {{ request()->routeIs('admin.skill.*') ? 'active' : '' }}">
                <i class="fas fa-code"></i>
                <span>Skills & Tooling</span>
            </a>
            <a href="{{ route('admin.experience.index') }}" class="nav-item-link {{ request()->routeIs('admin.experience.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i>
                <span>Experience</span>
            </a>
            <a href="{{ route('admin.project.index') }}" class="nav-item-link {{ request()->routeIs('admin.project.*') ? 'active' : '' }}">
                <i class="fas fa-laptop-code"></i>
                <span>Featured Projects</span>
            </a>
            <a href="{{ route('admin.organization.index') }}" class="nav-item-link {{ request()->routeIs('admin.organization.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Organization</span>
            </a>
            <a href="{{ route('admin.certification.index') }}" class="nav-item-link {{ request()->routeIs('admin.certification.*') ? 'active' : '' }}">
                <i class="fas fa-certificate"></i>
                <span>Certifications</span>
            </a>
            <a href="{{ route('admin.course.index') }}" class="nav-item-link {{ request()->routeIs('admin.course.*') ? 'active' : '' }}">
                <i class="fas fa-book-open"></i>
                <span>Courses & Bootcamps</span>
            </a>

            <div class="menu-header mt-3">Navigasi</div>
            <a href="/" target="_blank" class="nav-item-link text-warning">
                <i class="fas fa-arrow-up-right-from-square"></i>
                <span>Lihat Website</span>
            </a>

            <div class="mt-4 pt-3 border-top border-secondary">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 text-start d-flex align-items-center gap-2">
                        <i class="fas fa-arrow-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="fas fa-check-circle"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
