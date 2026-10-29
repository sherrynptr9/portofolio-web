@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Tambah Education</h3>
        <p class="text-muted mb-0">Tambahkan informasi pendidikan akademik baru.</p>
    </div>
    <a href="{{ route('admin.education.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.education.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Degree / Gelar</label>
                <input type="text" name="degree" class="form-control" placeholder="Contoh: Computer Science Bachelor's Degree in Information Systems" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Faculty & University</label>
                <input type="text" name="faculty_university" class="form-control" placeholder="Contoh: FACULTY OF COMPUTER SCIENCE... • GUNADARMA UNIVERSITY" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Period / Tahun</label>
                <input type="text" name="period" class="form-control" placeholder="Contoh: 2022 – 2026" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Urutan Tampilan</label>
                <input type="number" name="order" class="form-control" value="1">
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Daftar Mata Kuliah / Courses (Pisahkan dengan koma)</label>
                <textarea name="courses" rows="3" class="form-control" placeholder="Algorithms and Programming, Database System, Pemrograman Berbasis Web..."></textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Award Title / Honors Callout</label>
                <input type="text" name="award_title" class="form-control" placeholder="Recipient of the Academic Excellence Chancellor's Medal...">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
