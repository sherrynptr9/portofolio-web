<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::orderBy('order', 'asc')->get();
        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'badge_role' => 'required|string',
            'period' => 'required|string',
            'position' => 'required|string',
            'organization' => 'required|string',
            'description' => 'required|string',
            'tangible_outcome' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        Organization::create($data);

        return redirect()->route('admin.organization.index')->with('success', 'Organization berhasil ditambahkan!');
    }

    public function edit(Organization $organization)
    {
        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $data = $request->validate([
            'badge_role' => 'required|string',
            'period' => 'required|string',
            'position' => 'required|string',
            'organization' => 'required|string',
            'description' => 'required|string',
            'tangible_outcome' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $organization->update($data);

        return redirect()->route('admin.organization.index')->with('success', 'Organization berhasil diperbarui!');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('admin.organization.index')->with('success', 'Organization berhasil dihapus!');
    }
}
