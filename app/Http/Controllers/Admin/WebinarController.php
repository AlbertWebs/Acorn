<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::latest()->get();
        return view('admin.webinars.index', compact('webinars'));
    }

    public function create()
    {
        return view('admin.webinars.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('webinars', 'public');
        }

        $data['slug'] = Str::slug($request->title);
        Webinar::create($data);

        return redirect()->route('admin.webinars.index')->with('success', 'Webinar created successfully!');
    }

    public function edit(Webinar $webinar)
    {
        return view('admin.webinars.edit', compact('webinar'));
    }

    public function update(Request $request, Webinar $webinar)
    {
        $data = $request->validate([
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($webinar->featured_image) {
                Storage::disk('public')->delete($webinar->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('webinars', 'public');
        }

        $data['slug'] = Str::slug($request->title);
        $webinar->update($data);

        return redirect()->route('admin.webinars.index')->with('success', 'Webinar updated successfully!');
    }

    public function destroy(Webinar $webinar)
    {
        if ($webinar->featured_image) {
            Storage::disk('public')->delete($webinar->featured_image);
        }

        $webinar->delete();

        return redirect()->route('admin.webinars.index')->with('success', 'Webinar deleted successfully!');
    }
}


