<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the form for editing the contact data.
     */
    public function edit()
    {
        $contact = Contact::first();
        
        if (!$contact) {
            $contact = new Contact();
        }

        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the contact data.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'map_embed_url' => 'nullable|string',
            'map_link' => 'nullable|string|max:500',
        ]);

        $contact = Contact::first();
        
        if ($contact) {
            $contact->update($validated);
        } else {
            Contact::create($validated);
        }

        return redirect()->route('admin.contact.edit')->with('success', 'Data Contact berhasil diperbarui!');
    }
}
