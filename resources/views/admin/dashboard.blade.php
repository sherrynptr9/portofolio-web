@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Dashboard Overview</h3>
        <p class="text-muted mb-0">Kelola seluruh konten portofolio Sherrynita secara dinamis.</p>
    </div>
    <a href="/" target="_blank" class="btn btn-dark d-flex align-items-center gap-2">
        <i class="fas fa-eye"></i>
        <span>Pratinjau Situs</span>
    </a>
</div>

<!-- Stats Grid -->
<div class="row g-3 mb-4">
    <div class="col-md-4 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1 text-uppercase small fw-bold">Projects</p>
                <h3 class="fw-bold mb-0">{{ $stats['projects'] }}</h3>
            </div>
            <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3">
                <i class="fas fa-laptop-code fs-4"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1 text-uppercase small fw-bold">Experiences</p>
                <h3 class="fw-bold mb-0">{{ $stats['experiences'] }}</h3>
            </div>
            <div class="p-3 bg-success bg-opacity-10 text-success rounded-3">
                <i class="fas fa-briefcase fs-4"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1 text-uppercase small fw-bold">Skills</p>
                <h3 class="fw-bold mb-0">{{ $stats['skills'] }}</h3>
            </div>
            <div class="p-3 bg-danger bg-opacity-10 text-danger rounded-3">
                <i class="fas fa-code fs-4"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1 text-uppercase small fw-bold">Organizations</p>
                <h3 class="fw-bold mb-0">{{ $stats['organizations'] }}</h3>
            </div>
            <div class="p-3 bg-warning bg-opacity-10 text-warning rounded-3">
                <i class="fas fa-users fs-4"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1 text-uppercase small fw-bold">Certifications</p>
                <h3 class="fw-bold mb-0">{{ $stats['certifications'] }}</h3>
            </div>
            <div class="p-3 bg-info bg-opacity-10 text-info rounded-3">
                <i class="fas fa-certificate fs-4"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1 text-uppercase small fw-bold">Courses & Bootcamps</p>
                <h3 class="fw-bold mb-0">{{ $stats['courses'] }}</h3>
            </div>
            <div class="p-3 bg-secondary bg-opacity-10 text-secondary rounded-3">
                <i class="fas fa-book-open fs-4"></i>
            </div>
        </div>
    </div>
</div>

<!-- Profile Quick Card -->
<div class="admin-card">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="fw-bold mb-0">Informasi Pemilik Portofolio</h5>
        <a href="{{ route('admin.profile.index') }}" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-pen-to-square me-1"></i> Edit Profile
        </a>
    </div>
    <div class="row align-items-center">
        <div class="col-auto">
            <img src="{{ asset($profile->photo ?? 'images/sherrynita_profile.jpg') }}" alt="Profile" 
                 class="rounded-circle" style="width: 70px; height: 70px; object-fit: cover;">
        </div>
        <div class="col">
            <h5 class="fw-bold mb-1">{{ $profile->name }}</h5>
            <p class="text-muted mb-1">{{ $profile->badge_role }}</p>
            <div class="d-flex flex-wrap gap-3 small text-secondary">
                <span><i class="fas fa-envelope me-1"></i> {{ $profile->email }}</span>
                <span><i class="fas fa-phone me-1"></i> {{ $profile->phone }}</span>
                <span><i class="fas fa-location-dot me-1"></i> {{ $profile->location }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
