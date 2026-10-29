@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Tambah Organization</h3>
        <p class="text-muted mb-0">Tambahkan riwayat organisasi dan kepemimpinan baru.</p>
    </div>
    <a href="{{ route('admin.organization.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.organization.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Role / Kategori Badge</label>
                <input type="text" name="badge_role" class="form-control" placeholder="Leadership / Governance / Mentorship" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Periode / Tahun</label>
                <input type="text" name="period" class="form-control" placeholder="2021 – 2022" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="1">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Posisi / Jabatan</label>
                <input type="text" name="position" class="form-control" placeholder="Contoh: Head of Design & Tech Division" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Organisasi / Komunitas</label>
                <input type="text" name="organization" class="form-control" placeholder="Contoh: Google Developer Student Clubs (GDSC)" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Deskripsi Peran</label>
                <textarea name="description" rows="3" class="form-control" placeholder="Jelaskan peran, tanggung jawab, tim yang dipimpin..." required></textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Tangible Outcome / Hasil Nyata (Kotak Kuning)</label>
                <textarea name="tangible_outcome" rows="2" class="form-control" placeholder="4 student projects reached the global Top 100 Solution Challenge semifinal bracket..."></textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Link Dokumentasi (Opsional)</label>
                <input type="text" name="link" class="form-control" value="#">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Organization</button>
            </div>
        </div>
    </form>
</div>
@endsection
