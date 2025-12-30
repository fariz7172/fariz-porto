<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        $existingTechs = Project::all()->pluck('tech')
            ->flatten()
            ->map(fn($tech) => trim($tech))
            ->unique()
            ->values();

        return view('admin.projects.create', compact('existingTechs'));
    }

    /**
     * Store a newly created project.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'full_description' => 'nullable|string',
            'tech' => 'nullable|string',
            'features' => 'nullable|string',
            'color' => 'required|string|max:100',
            'year' => 'nullable|string|max:4',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'project_url' => 'nullable|url|max:500',
        ]);

        // Convert comma-separated strings to arrays
        $validated['tech'] = !empty($validated['tech']) 
            ? array_map('trim', explode(',', $validated['tech'])) 
            : [];
        $validated['features'] = !empty($validated['features']) 
            ? array_map('trim', explode(',', $validated['features'])) 
            : [];
        $validated['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Show the form for editing a project.
     */
    public function edit(Project $project)
    {
        $existingTechs = Project::all()->pluck('tech')
            ->flatten()
            ->map(fn($tech) => trim($tech))
            ->unique()
            ->values();

        return view('admin.projects.edit', compact('project', 'existingTechs'));
    }

    /**
     * Update the specified project.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'full_description' => 'nullable|string',
            'tech' => 'nullable|string',
            'features' => 'nullable|string',
            'color' => 'required|string|max:100',
            'year' => 'nullable|string|max:4',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'project_url' => 'nullable|url|max:500',
        ]);

        // Convert comma-separated strings to arrays
        $validated['tech'] = !empty($validated['tech']) 
            ? array_map('trim', explode(',', $validated['tech'])) 
            : [];
        $validated['features'] = !empty($validated['features']) 
            ? array_map('trim', explode(',', $validated['features'])) 
            : [];
        $validated['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Remove the specified project.
     */
    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}
