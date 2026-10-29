@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Kelola Courses & Bootcamps</h3>
        <p class="text-muted mb-0">Kelola daftar bootcamp intensif, penyedia kursus (DeepLearning.AI, Frontend Masters, dll), durasi jam, dan status kelulusan.</p>
    </div>
    <a href="{{ route('admin.course.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus"></i>
        <span>Tambah Course</span>
    </a>
</div>

<div class="admin-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Penyedia & Durasi</th>
                    <th>Judul Course / Bootcamp</th>
                    <th>Status Kelulusan</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $c)
                <tr>
                    <td class="ps-4">
                        <div class="fw-bold">{{ $c->provider }}</div>
                        <span class="badge bg-light text-secondary border">{{ $c->hours }}</span>
                    </td>
                    <td>
                        <div class="fw-bold">{{ $c->title }}</div>
                        <small class="text-muted">{{ Str::limit($c->description, 50) }}</small>
                    </td>
                    <td>
                        <span class="badge bg-success bg-opacity-25 text-success border border-success">
                            {{ $c->status }}
                        </span>
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('admin.course.edit', $c->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.course.destroy', $c->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus course ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data course.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
