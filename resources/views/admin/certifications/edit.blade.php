@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Sertifikasi</h3>
        <p class="text-muted mb-0">Ubah data sertifikasi profesional.</p>
    </div>
    <a href="{{ route('admin.certification.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.certification.update', $certification->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Lembaga Penerbit (Issuer)</label>
                <input type="text" name="issuer" class="form-control" value="{{ old('issuer', $certification->issuer) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Judul Sertifikasi</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $certification->title) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Deskripsi Sertifikasi</label>
                <textarea name="description" rows="3" class="form-control" required>{{ old('description', $certification->description) }}</textarea>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Tanggal Penerbitan</label>
                <input type="text" name="issued_date" class="form-control" value="{{ old('issued_date', $certification->issued_date) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Teks Status Badge</label>
                <input type="text" name="badge_text" class="form-control" value="{{ old('badge_text', $certification->badge_text) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Warna Badge</label>
                <select name="badge_type" class="form-select" required>
                    <option value="green" {{ $certification->badge_type == 'green' ? 'selected' : '' }}>Hijau (Green)</option>
                    <option value="yellow" {{ $certification->badge_type == 'yellow' ? 'selected' : '' }}>Kuning (Yellow)</option>
                    <option value="gray" {{ $certification->badge_type == 'gray' ? 'selected' : '' }}>Abu-abu (Gray)</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Logo Penerbit (Opsional)</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                @if($certification->logo)
                    <div class="mt-2">
                        <img src="{{ asset($certification->logo) }}" alt="Preview" style="height: 40px;">
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Link Sertifikat (Opsional)</label>
                <input type="text" name="link" class="form-control" value="{{ old('link', $certification->link) }}">
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $certification->order) }}">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection
