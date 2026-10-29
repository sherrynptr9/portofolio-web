<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'edition_tag' => 'nullable|string',
            'section_number' => 'nullable|string',
            'badge_role' => 'nullable|string',
            'about_text' => 'required|string',
            'phone' => 'nullable|string',
            'phone_note' => 'nullable|string',
            'email' => 'nullable|email',
            'email_note' => 'nullable|string',
            'location' => 'nullable|string',
            'location_note' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'github' => 'nullable|string',
            'github_url' => 'nullable|string',
            'response_time' => 'nullable|string',
            'response_note' => 'nullable|string',
            'footer_bio' => 'nullable|string',
            'dispatch_social' => 'nullable|string',
            'office_note' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $data['photo'] = 'storage/' . $path;
        }

        if ($request->hasFile('cv_file')) {
            $path = $request->file('cv_file')->store('cv', 'public');
            $data['cv_file'] = 'storage/' . $path;
        }

        $profile->update($data);

        return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil diperbarui!');
    }
}
