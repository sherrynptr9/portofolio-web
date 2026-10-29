@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Education</h3>
        <p class="text-muted mb-0">Ubah informasi pendidikan akademik.</p>
    </div>
    <a href="{{ route('admin.education.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.education.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Degree / Gelar</label>
                <input type="text" name="degree" class="form-control" value="{{ old('degree', $education->degree) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Faculty & University</label>
                <input type="text" name="faculty_university" class="form-control" value="{{ old('faculty_university', $education->faculty_university) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Period / Tahun</label>
                <input type="text" name="period" class="form-control" value="{{ old('period', $education->period) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Urutan Tampilan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $education->order) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Daftar Mata Kuliah / Courses (Pisahkan dengan koma)</label>
                <textarea name="courses" rows="3" class="form-control">{{ old('courses', $education->courses) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Award Title / Honors Callout</label>
                <input type="text" name="award_title" class="form-control" value="{{ old('award_title', $education->award_title) }}">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection
