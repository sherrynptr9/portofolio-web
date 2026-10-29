<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Education;
use App\Models\SkillGroup;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Organization;
use App\Models\Certification;
use App\Models\Course;

class FrontController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $education = Education::first();
        $skillGroups = SkillGroup::with(['skills' => function($q) {
            $q->orderBy('order', 'asc');
        }])->orderBy('order', 'asc')->get();
        $experiences = Experience::orderBy('order', 'asc')->get();
        $projects = Project::orderBy('order', 'asc')->get();
        $organizations = Organization::orderBy('order', 'asc')->get();
        $certifications = Certification::orderBy('order', 'asc')->get();
        $courses = Course::orderBy('order', 'asc')->get();

        return view('welcome', compact(
            'profile',
            'education',
            'skillGroups',
            'experiences',
            'projects',
            'organizations',
            'certifications',
            'courses'
        ));
    }
}
