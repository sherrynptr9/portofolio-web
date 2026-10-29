@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Kelola Featured Projects</h3>
        <p class="text-muted mb-0">Kelola daftar portofolio karya, filter kategori, badge metrik, dan gambar thumbnail.</p>
    </div>
    <a href="{{ route('admin.project.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus"></i>
        <span>Tambah Project</span>
    </a>
</div>

<div class="admin-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Preview</th>
                    <th>Judul & Badge</th>
                    <th>Kategori Filter</th>
                    <th>Tags</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $p)
                <tr>
                    <td class="ps-4" style="width: 80px;">
                        <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" class="rounded" style="width: 65px; height: 42px; object-fit: cover;">
                    </td>
                    <td>
                        <div class="fw-bold">{{ $p->title }}</div>
                        <span class="badge bg-dark text-white" style="font-size: 9px;">{{ $p->badge }}</span>
                    </td>
                    <td>
                        @php
                            $cats = array_filter(array_map('trim', explode(',', $p->category_filter ?? '')));
                        @endphp
                        @forelse($cats as $cat)
                            <span class="badge bg-light text-dark border me-1">{{ $cat }}</span>
                        @empty
                            <span class="text-muted small">-</span>
                        @endforelse
                    </td>

                    <td style="max-width: 200px;">
                        <small class="text-muted">{{ Str::limit($p->tags, 35) }}</small>
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('admin.project.edit', $p->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.project.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus project ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada project.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
