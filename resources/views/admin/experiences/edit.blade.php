@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Experience</h3>
        <p class="text-muted mb-0">Ubah riwayat pengalaman profesional.</p>
    </div>
    <a href="{{ route('admin.experience.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.experience.update', $experience->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Posisi / Role</label>
                <input type="text" name="position" class="form-control" value="{{ old('position', $experience->position) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Perusahaan / Organisasi</label>
                <input type="text" name="company" class="form-control" value="{{ old('company', $experience->company) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Periode / Waktu</label>
                <input type="text" name="period" class="form-control" value="{{ old('period', $experience->period) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Tags (Pisahkan dengan koma)</label>
                <input type="text" name="tags" class="form-control" value="{{ old('tags', $experience->tags) }}">
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $experience->order) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Summary Paragraf (Lead)</label>
                <textarea name="summary" rows="2" class="form-control">{{ old('summary', $experience->summary) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Judul Kontribusi / Responsibilities</label>
                <input type="text" name="contributions_title" class="form-control" value="{{ old('contributions_title', $experience->contributions_title) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Detail Kontribusi (Satu poin per baris, format 'Judul: Keterangan')</label>
                <textarea name="contributions" rows="6" class="form-control">{{ old('contributions', $experience->contributions) }}</textarea>
            </div>

            <!-- Highlights -->
            <div class="col-12 mt-4">
                <h6 class="fw-bold border-bottom pb-2">Metric Highlights (Kartu Kanan)</h6>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Metric 1 - Nilai / Judul</label>
                <input type="text" name="metric_1_val" class="form-control" value="{{ old('metric_1_val', $experience->metric_1_val) }}">
                <label class="form-label fw-bold mt-2">Metric 1 - Deskripsi</label>
                <textarea name="metric_1_desc" rows="2" class="form-control">{{ old('metric_1_desc', $experience->metric_1_desc) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Metric 2 - Nilai / Judul</label>
                <input type="text" name="metric_2_val" class="form-control" value="{{ old('metric_2_val', $experience->metric_2_val) }}">
                <label class="form-label fw-bold mt-2">Metric 2 - Deskripsi</label>
                <textarea name="metric_2_desc" rows="2" class="form-control">{{ old('metric_2_desc', $experience->metric_2_desc) }}</textarea>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection
