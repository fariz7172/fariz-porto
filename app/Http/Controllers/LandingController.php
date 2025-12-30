<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Project;

class LandingController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        $about = About::first();
        $projects = Project::active()->ordered()->get();
        $contact = Contact::first();

        // Extract unique categories (tech stack)
        $categories = $projects->pluck('tech')
            ->flatten()
            ->map(fn($tech) => trim($tech))
            ->unique()
            ->values();

        return view('landing', compact('about', 'projects', 'contact', 'categories'));
    }
}
