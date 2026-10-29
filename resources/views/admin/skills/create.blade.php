@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Tambah Skill Baru</h3>
        <p class="text-muted mb-0">Tambahkan skill ke dalam kelompok keahlian.</p>
    </div>
    <a href="{{ route('admin.skill.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.skill.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Kelompok Skill (Group)</label>
                <select name="group_key" class="form-select" required>
                    @foreach($groups as $g)
                        <option value="{{ $g->group_key }}">{{ $g->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Subgroup (Opsional)</label>
                <input type="text" name="subgroup" class="form-control" placeholder="Contoh: Frontend Development / Backend Development">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Skill</label>
                <input type="text" name="name" class="form-control" placeholder="Contoh: React.js, Python, Figma..." required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Persentase (0 - 100)%</label>
                <input type="number" name="percentage" class="form-control" min="0" max="100" value="90" required>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="1">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Skill</button>
            </div>
        </div>
    </form>
</div>
@endsection
