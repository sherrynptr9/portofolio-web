@extends('admin.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Profile & Biography</h3>
        <p class="text-muted mb-0">Perbarui informasi utama hero section, kontak, dan footer.</p>
    </div>
</div>

<div class="admin-card">
    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <!-- Basic Profile -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $profile->name) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Badge Role / Specialization</label>
                <input type="text" name="badge_role" class="form-control" value="{{ old('badge_role', $profile->badge_role) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Folio Index Tag</label>
                <input type="text" name="edition_tag" class="form-control" value="{{ old('edition_tag', $profile->edition_tag) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Section Subtitle</label>
                <input type="text" name="section_number" class="form-control" value="{{ old('section_number', $profile->section_number) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">About Text (Biography Paragraph)</label>
                <textarea name="about_text" rows="5" class="form-control" required>{{ old('about_text', $profile->about_text) }}</textarea>
            </div>

            <!-- Photos & CV -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Foto Profil (Ganti jika perlu)</label>
                <input type="file" name="photo" class="form-control" accept="image/*">
                @if($profile->photo)
                    <div class="mt-2">
                        <img src="{{ asset($profile->photo) }}" alt="Preview" style="height: 60px; border-radius: 6px;">
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">File CV (PDF)</label>
                <input type="file" name="cv_file" class="form-control" accept=".pdf">
            </div>

            <!-- Contact Details -->
            <div class="col-12 mt-4">
                <h5 class="fw-bold border-bottom pb-2">Direct Correspondence / Kontak</h5>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Nomor Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Catatan Telepon</label>
                <input type="text" name="phone_note" class="form-control" value="{{ old('phone_note', $profile->phone_note) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $profile->email) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Catatan Email</label>
                <input type="text" name="email_note" class="form-control" value="{{ old('email_note', $profile->email_note) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Alamat / Lokasi</label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $profile->location) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Catatan Lokasi</label>
                <input type="text" name="location_note" class="form-control" value="{{ old('location_note', $profile->location_note) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">LinkedIn Display Text</label>
                <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin', $profile->linkedin) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">LinkedIn URL</label>
                <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $profile->linkedin_url) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">GitHub Display Text</label>
                <input type="text" name="github" class="form-control" value="{{ old('github', $profile->github) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">GitHub URL</label>
                <input type="url" name="github_url" class="form-control" value="{{ old('github_url', $profile->github_url) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Response Time</label>
                <input type="text" name="response_time" class="form-control" value="{{ old('response_time', $profile->response_time) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Response Note</label>
                <input type="text" name="response_note" class="form-control" value="{{ old('response_note', $profile->response_note) }}">
            </div>

            <!-- Footer Details -->
            <div class="col-12 mt-4">
                <h5 class="fw-bold border-bottom pb-2">Footer Settings</h5>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Footer Bio</label>
                <textarea name="footer_bio" rows="2" class="form-control">{{ old('footer_bio', $profile->footer_bio) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Dispatch & Social Links</label>
                <input type="text" name="dispatch_social" class="form-control" value="{{ old('dispatch_social', $profile->dispatch_social) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Office Note</label>
                <input type="text" name="office_note" class="form-control" value="{{ old('office_note', $profile->office_note) }}">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 fw-bold">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
