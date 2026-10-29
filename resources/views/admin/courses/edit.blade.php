@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Course & Bootcamp</h3>
        <p class="text-muted mb-0">Ubah data kursus intensif atau status kelulusan.</p>
    </div>
    <a href="{{ route('admin.course.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.course.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Penyedia Kursus (Provider)</label>
                <input type="text" name="provider" class="form-control" value="{{ old('provider', $course->provider) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Durasi Jam</label>
                <input type="text" name="hours" class="form-control" value="{{ old('hours', $course->hours) }}" required>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $course->order) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Judul Course</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $course->title) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Deskripsi Silabus / Topik</label>
                <textarea name="description" rows="3" class="form-control" required>{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Status Kelulusan</label>
                <input type="text" name="status" class="form-control" value="{{ old('status', $course->status) }}" required>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection
