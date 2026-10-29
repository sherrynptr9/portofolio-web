@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Project</h3>
        <p class="text-muted mb-0">Ubah data karya atau proyek.</p>
    </div>
    <a href="{{ route('admin.project.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data" id="projectForm">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Judul Project</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Badge Pojok Kiri (Overlay)</label>
                <input type="text" name="badge" class="form-control" value="{{ old('badge', $project->badge) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold d-block">
                    Kategori Filter <span class="text-danger">*</span>
                    <small class="text-muted fw-normal">(Bisa pilih lebih dari satu, contoh: UI/UX Design dan Website)</small>
                </label>
                @php
                    $currentCategories = old('category_filter') 
                        ? (is_array(old('category_filter')) ? old('category_filter') : array_map('trim', explode(',', old('category_filter'))))
                        : array_map('trim', explode(',', $project->category_filter ?? ''));
                @endphp
                <div class="p-3 border rounded bg-light">
                    <div class="d-flex flex-wrap gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category_filter[]" value="Website" id="cat_web" {{ in_array('Website', $currentCategories) ? 'checked' : '' }}>
                            <label class="form-check-label fw-medium" for="cat_web">Website</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category_filter[]" value="UI/UX Design" id="cat_uiux" {{ in_array('UI/UX Design', $currentCategories) ? 'checked' : '' }}>
                            <label class="form-check-label fw-medium" for="cat_uiux">UI/UX Design</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category_filter[]" value="Data Analyst" id="cat_da" {{ in_array('Data Analyst', $currentCategories) ? 'checked' : '' }}>
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
                <textarea name="description" rows="3" class="form-control" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="col-md-9">
                <label class="form-label fw-bold">Tech Stack / Tags (Pisahkan dengan koma)</label>
                <input type="text" name="tags" class="form-control" value="{{ old('tags', $project->tags) }}">
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Urutan</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $project->order) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Gambar Thumbnail Project</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if($project->image)
                    <div class="mt-2">
                        <img src="{{ asset($project->image) }}" alt="Preview" style="height: 60px; border-radius: 6px;">
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Link URL Project (Opsional)</label>
                <input type="text" name="link" class="form-control" value="{{ old('link', $project->link) }}">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Perubahan</button>
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
