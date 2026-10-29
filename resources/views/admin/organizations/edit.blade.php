@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Organization</h3>
        <p class="text-muted mb-0">Ubah data riwayat organisasi dan kepemimpinan.</p>
    </div>
    <a href="{{ route('admin.organization.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.organization.update', $organization->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Role / Kategori Badge</label>
                <input type="text" name="badge_role" class="form-control" value="{{ old('badge_role', $organization->badge_role) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Periode / Tahun</label>
                <input type="text" name="period" class="form-control" value="{{ old('period', $organization->period) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $organization->order) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control" value="{{ old('position', $organization->position) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Organisasi / Komunitas</label>
                <input type="text" name="organization" class="form-control" value="{{ old('organization', $organization->organization) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Deskripsi Peran</label>
                <textarea name="description" rows="3" class="form-control" required>{{ old('description', $organization->description) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Tangible Outcome / Hasil Nyata (Kotak Kuning)</label>
                <textarea name="tangible_outcome" rows="2" class="form-control">{{ old('tangible_outcome', $organization->tangible_outcome) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Link Dokumentasi (Opsional)</label>
                <input type="text" name="link" class="form-control" value="{{ old('link', $organization->link) }}">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection
