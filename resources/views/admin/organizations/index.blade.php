@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Kelola Organization & Leadership</h3>
        <p class="text-muted mb-0">Kelola riwayat organisasi kemahasiswaan, kepemimpinan, dan pencapaian nyata.</p>
    </div>
    <a href="{{ route('admin.organization.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus"></i>
        <span>Tambah Organization</span>
    </a>
</div>

<div class="admin-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Role Badge & Periode</th>
                    <th>Posisi & Organisasi</th>
                    <th>Tangible Outcome</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($organizations as $org)
                <tr>
                    <td class="ps-4">
                        <span class="badge bg-warning text-dark">{{ $org->badge_role }}</span>
                        <div class="small text-muted mt-1">{{ $org->period }}</div>
                    </td>
                    <td>
                        <div class="fw-bold">{{ $org->position }}</div>
                        <div class="small text-secondary">{{ $org->organization }}</div>
                    </td>
                    <td style="max-width: 300px;">
                        <small class="text-muted">{{ Str::limit($org->tangible_outcome, 60) }}</small>
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('admin.organization.edit', $org->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.organization.destroy', $org->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data organisasi ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data organisasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
