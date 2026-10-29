@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Tambah Project</h3>
        <p class="text-muted mb-0">Tambahkan hasil karya atau proyek baru.</p>
    </div>
    <a href="{{ route('admin.project.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" id="projectForm">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Judul Project</label>
                <input type="text" name="title" class="form-control" placeholder="Contoh: Alcen.ID" value="{{ old('title') }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Badge Pojok Kiri (Overlay)</label>
                <input type="text" name="badge" class="form-control" placeholder="UI/UX & WEBSITE BUILD" value="{{ old('badge') }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold d-block">
                    Kategori Filter <span class="text-danger">*</span>
                    <small class="text-muted fw-normal">(Bisa pilih lebih dari satu, contoh: UI/UX Design dan Website)</small>
                </label>
                @php
                    $oldCats = old('category_filter', ['Website']);
                    if (!is_array($oldCats)) {
                        $oldCats = array_map('trim', explode(',', $oldCats));
                    }
                @endphp
                <div class="p-3 border rounded bg-light">
                    <div class="d-flex flex-wrap gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category_filter[]" value="Website" id="cat_web" {{ in_array('Website', $oldCats) ? 'checked' : '' }}>
                            <label class="form-check-label fw-medium" for="cat_web">Website</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category_filter[]" value="UI/UX Design" id="cat_uiux" {{ in_array('UI/UX Design', $oldCats) ? 'checked' : '' }}>
                            <label class="form-check-label fw-medium" for="cat_uiux">UI/UX Design</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category_filter[]" value="Data Analyst" id="cat_da" {{ in_array('Data Analyst', $oldCats) ? 'checked' : '' }}>
                            <label class="form-check-label fw-medium" for="cat_da">Data Analyst</label>
                        </div>
                    </div>
                </div>
                @error('category_filter')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Deskripsi Project</label>
                <textarea name="description" rows="3" class="form-control" placeholder="Deskripsikan fitur, arsitektur, atau dampak proyek..." required>{{ old('description') }}</textarea>
            </div>

            <div class="col-md-9">
                <label class="form-label fw-bold">Tech Stack / Tags (Pisahkan dengan koma)</label>
                <input type="text" name="tags" class="form-control" placeholder="Figma, User Journeys, Tokens" value="{{ old('tags') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Gambar Thumbnail Project</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Link URL Project (Opsional)</label>
                <input type="text" name="link" class="form-control" value="{{ old('link', '#') }}">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Project</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('projectForm').addEventListener('submit', function(e) {
        const checked = document.querySelectorAll('input[name="category_filter[]"]:checked');
        if (checked.length === 0) {
            e.preventDefault();
            alert('Silakan pilih minimal satu Kategori Filter.');
        }
    });
</script>
@endsection
