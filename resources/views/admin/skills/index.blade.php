@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Kelola Skills & Tooling</h3>
        <p class="text-muted mb-0">Atur keahlian teknis (UI/UX Craft, Full Stack Web, Data Analytics) beserta persentasenya.</p>
    </div>
    <a href="{{ route('admin.skill.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="fas fa-plus"></i>
        <span>Tambah Skill Baru</span>
    </a>
</div>

<div class="row g-4">
    @foreach($groups as $grp)
        <div class="col-lg-4">
            <div class="admin-card h-100 p-0 overflow-hidden">
                <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold mb-0">{{ $grp->title }}</h6>
                        <small class="text-muted">{{ $grp->confidence_score }}</small>
                    </div>
                    <span class="badge bg-secondary">{{ $grp->skills->count() }} skills</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <tbody>
                            @forelse($grp->skills as $skill)
                            <tr>
                                <td class="ps-3">
                                    <div class="fw-semibold">{{ $skill->name }}</div>
                                    @if($skill->subgroup)
                                        <small class="text-muted">{{ $skill->subgroup }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-warning text-dark fw-bold">{{ $skill->percentage }}%</span>
                                </td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('admin.skill.edit', $skill->id) }}" class="btn btn-sm btn-outline-primary py-0 px-2">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.skill.destroy', $skill->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger py-0 px-2" onclick="return confirm('Hapus skill ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">Belum ada skill.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
