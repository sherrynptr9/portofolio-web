@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Kelola Honors & Certifications</h3>
        <p class="text-muted mb-0">Kelola sertifikasi profesional (Google, IxDF, AWS, dll), tanggal penerbitan, dan status badge.</p>
    </div>
    <a href="{{ route('admin.certification.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus"></i>
        <span>Tambah Sertifikasi</span>
    </a>
</div>

<div class="admin-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Logo</th>
                    <th>Judul Sertifikasi</th>
                    <th>Penerbit (Issuer)</th>
                    <th>Tanggal Terbit</th>
                    <th>Status Badge</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certifications as $cert)
                <tr>
                    <td class="ps-4" style="width: 60px;">
                        @if($cert->logo)
                            <img src="{{ asset($cert->logo) }}" alt="Logo" style="width: 38px; height: 38px; object-fit: contain;">
                        @else
                            <i class="fas fa-award text-muted fs-4"></i>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold">{{ $cert->title }}</div>
                    </td>
                    <td>
                        <span class="badge bg-light text-secondary border">{{ $cert->issuer }}</span>
                    </td>
                    <td>{{ $cert->issued_date }}</td>
                    <td>
                        <span class="badge bg-{{ $cert->badge_type == 'green' ? 'success' : ($cert->badge_type == 'yellow' ? 'warning text-dark' : 'secondary') }}">
                            {{ $cert->badge_text }}
                        </span>
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('admin.certification.edit', $cert->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.certification.destroy', $cert->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus sertifikasi ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada sertifikasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
