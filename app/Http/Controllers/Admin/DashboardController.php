<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Organization;
use App\Models\Certification;
use App\Models\Course;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'experiences' => Experience::count(),
            'skills' => Skill::count(),
            'organizations' => Organization::count(),
            'certifications' => Certification::count(),
            'courses' => Course::count(),
        ];

        $profile = Profile::first();

        return view('admin.dashboard', compact('stats', 'profile'));
    }
}
