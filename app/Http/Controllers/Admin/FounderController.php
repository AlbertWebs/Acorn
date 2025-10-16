<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Founder;

class FounderController extends Controller
{
    public function edit()
    {
        $founder = Founder::first(); // You only have one
        return view('admin.founder.edit', compact('founder'));
    }

   public function update(Request $request)
    {
        $founder = Founder::firstOrFail();

        // ✅ Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'roles' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'catalyst_for_change' => 'nullable|string',
            'community_impact' => 'nullable|string',
            'leadership' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
        ]);

        // ✅ Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($founder->image && file_exists(public_path($founder->image))) {
                unlink(public_path($founder->image));
            }

            // Save new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/founders'), $imageName);

            // Save image path in validated data
            $validated['image'] = 'uploads/founders/' . $imageName;
        }

        // ✅ Update founder
        $founder->update($validated);

        return redirect()->route('admin.founder.edit')->with('success', 'Founder profile updated successfully.');
    }


    public function show()
    {
        $founder = Founder::first();
        return view('admin.founder.show', compact('founder'));
    }
}
