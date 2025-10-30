<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::latest()->paginate(20);
        return view('admin.galleries.index', compact('items'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        // Handle standard form submission (single image)
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'image' => 'required|image|max:5120',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $validated['title'] ?? null,
            'caption' => $validated['caption'] ?? null,
            'image' => $path,
            'is_active' => true,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Image added to gallery');
    }

    public function upload(Request $request)
    {
        // Dropzone async upload (one file per request)
        $request->validate([
            'file' => 'required|image|max:5120',
        ]);

        $path = $request->file('file')->store('gallery', 'public');

        $item = Gallery::create([
            'image' => $path,
            'is_active' => true,
        ]);

        return response()->json([
            'status' => 'ok',
            'id' => $item->id,
            'url' => asset('storage/'.$item->image),
        ]);
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $gallery->image = $path;
        }

        $gallery->title = $validated['title'] ?? $gallery->title;
        $gallery->caption = $validated['caption'] ?? $gallery->caption;
        if (isset($validated['is_active'])) {
            $gallery->is_active = (bool)$validated['is_active'];
        }
        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery updated');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item deleted');
    }
}


