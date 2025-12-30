<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show the form for editing the about data.
     */
    public function edit()
    {
        $about = About::first();
        
        if (!$about) {
            $about = new About([
                'name' => 'Ahmad Farid',
                'title' => 'Fullstack Developer',
                'skills' => ['Laravel', 'MySQL', 'Tailwind', 'JavaScript', 'REST API', 'Vue.js'],
            ]);
        }

        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the about data.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'skills' => 'nullable|string',
        ]);

        // Convert skills from comma-separated string to array
        if (!empty($validated['skills'])) {
            $validated['skills'] = array_map('trim', explode(',', $validated['skills']));
        } else {
            $validated['skills'] = [];
        }

        $about = About::first();

        // Handle Image Upload
        if ($request->hasFile('hero_image')) {
            $request->validate([
                'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            // Delete old image if exists
            if ($about && $about->hero_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($about->hero_image);
            }

            $validated['hero_image'] = $request->file('hero_image')->store('about', 'public');
        }
        
        if ($about) {
            $about->update($validated);
        } else {
            About::create($validated);
        }

        return redirect()->route('admin.about.edit')->with('success', 'Data About berhasil diperbarui!');
    }
}
