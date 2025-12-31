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
    public function index(\Illuminate\Http\Request $request)
    {
        $about = About::first();
        $contact = Contact::first();

        // Query Projects
        $query = Project::active()->ordered();

        // Apply Category Filter
        if ($request->has('category') && $request->category !== 'all') {
            // Since tech is stored as a JSON array, we use whereJsonContains
            // Or if it's cast to array but stored as string in DB, might need logic.
            // Assuming MySQL 5.7+ JSON column or string column.
            // If it's a simple text column storing JSON, distinct logic might be needed.
            // Based on earlier view, it's cast to array in model.
            // Let's assume standard JSON search if possible, or reliable LIKE fallback.
            $query->where('tech', 'like', '%' . $request->category . '%');
        }

        // Pagination
        $projects = $query->paginate(6)->withQueryString();

        // Extract unique categories (tech stack) FROM ALL ACTIVE PROJECTS (not just paginated ones)
        // We need this for the filter buttons to still show all available options
        $allProjects = Project::active()->get();
        $categories = $allProjects->pluck('tech')
            ->flatten()
            ->map(fn($tech) => trim($tech))
            ->unique()
            ->values();

        return view('landing', compact('about', 'projects', 'contact', 'categories'));
    }
}
