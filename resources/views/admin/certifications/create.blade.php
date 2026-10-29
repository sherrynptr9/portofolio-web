@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Tambah Sertifikasi</h3>
        <p class="text-muted mb-0">Tambahkan sertifikasi atau tanda penghargaan profesional baru.</p>
    </div>
    <a href="{{ route('admin.certification.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.certification.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Lembaga Penerbit (Issuer)</label>
                <input type="text" name="issuer" class="form-control" placeholder="Contoh: GOOGLE • COURSERA" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Judul Sertifikasi</label>
                <input type="text" name="title" class="form-control" placeholder="Contoh: Professional Data Analytics" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Deskripsi Sertifikasi</label>
                <textarea name="description" rows="3" class="form-control" placeholder="In-depth statistical workflows, R language..." required></textarea>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Tanggal Penerbitan</label>
                <input type="text" name="issued_date" class="form-control" placeholder="Contoh: Issued: Oct 2023" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Teks Status Badge</label>
                <input type="text" name="badge_text" class="form-control" placeholder="Verified Active / Top 1% Class / ID: #AWS-..." required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Warna Badge</label>
                <select name="badge_type" class="form-select" required>
                    <option value="green">Hijau (Green)</option>
                    <option value="yellow">Kuning (Yellow)</option>
                    <option value="gray">Abu-abu (Gray)</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Logo Penerbit (Opsional)</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Link Sertifikat (Opsional)</label>
                <input type="text" name="link" class="form-control" value="#">
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="1">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Sertifikasi</button>
            </div>
        </div>
    </form>
</div>
@endsection
