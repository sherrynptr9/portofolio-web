@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Kelola Professional Experience</h3>
        <p class="text-muted mb-0">Kelola riwayat karir, posisi, perusahaan, tanggung jawab, dan metrik pencapaian.</p>
    </div>
    <a href="{{ route('admin.experience.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus"></i>
        <span>Tambah Experience</span>
    </a>
</div>

<div class="admin-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Posisi & Perusahaan</th>
                    <th>Periode</th>
                    <th>Tags</th>
                    <th>Highlight Metrics</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                <tr>
                    <td class="ps-4">
                        <div class="fw-bold">{{ $exp->position }}</div>
                        <div class="small text-secondary">{{ $exp->company }}</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ $exp->period }}</span></td>
                    <td style="max-width: 250px;">
                        <small class="text-muted">{{ Str::limit($exp->tags, 40) }}</small>
                    </td>
                    <td>
                        @if($exp->metric_1_val)
                            <span class="badge bg-warning text-dark">{{ $exp->metric_1_val }}</span>
                        @endif
                        @if($exp->metric_2_val)
                            <span class="badge bg-secondary text-white">{{ $exp->metric_2_val }}</span>
                        @endif
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('admin.experience.edit', $exp->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.experience.destroy', $exp->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus experience ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data experience.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
