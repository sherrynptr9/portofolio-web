@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Kelola Education</h3>
        <p class="text-muted mb-0">Atur gelar akademik, universitas, daftar mata kuliah, dan penghargaan.</p>
    </div>
    <a href="{{ route('admin.education.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus"></i>
        <span>Tambah Education</span>
    </a>
</div>

<div class="admin-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Degree</th>
                    <th>Faculty & University</th>
                    <th>Tahun</th>
                    <th>Award / Capstone</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($educations as $edu)
                <tr>
                    <td class="ps-4 fw-bold">{{ $edu->degree }}</td>
                    <td>{{ $edu->faculty_university }}</td>
                    <td><span class="badge bg-light text-dark border">{{ $edu->period }}</span></td>
                    <td class="small text-secondary">{{ Str::limit($edu->award_title, 40) }}</td>
                    <td class="text-end pe-4">
                        <a href="{{ route('admin.education.edit', $edu->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.education.destroy', $edu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data education.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
