<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Csr;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CsrController extends Controller
{
    public function index()
    {
        $csrs = Csr::latest()->get();
        return view('admin.csrs.index', compact('csrs'));
    }

    public function create()
    {
        return view('admin.csrs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Handle PDF upload
        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')->store('csr/pdfs', 'public');
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $csr = Csr::create($data);

        return redirect()->route('admin.csrs.index')->with('success', 'CSR created successfully!');
    }

    public function edit(Csr $csr)
    {
        // Get gallery images for this CSR
        $galleryImages = Gallery::where('context_type', 'csr')
            ->where('context_slug', $csr->id)
            ->get();
        
        return view('admin.csrs.edit', compact('csr', 'galleryImages'));
    }

    public function update(Request $request, Csr $csr)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Handle PDF upload
        if ($request->hasFile('pdf_file')) {
            if ($csr->pdf_file) {
                Storage::disk('public')->delete($csr->pdf_file);
            }
            $data['pdf_file'] = $request->file('pdf_file')->store('csr/pdfs', 'public');
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $csr->update($data);

        return redirect()->route('admin.csrs.index')->with('success', 'CSR updated successfully!');
    }

    public function destroy(Csr $csr)
    {
        // Delete PDF file
        if ($csr->pdf_file) {
            Storage::disk('public')->delete($csr->pdf_file);
        }

        // Delete associated gallery images
        $galleryImages = Gallery::where('context_type', 'csr')
            ->where('context_slug', $csr->id)
            ->get();
        
        foreach ($galleryImages as $image) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }

        $csr->delete();

        return redirect()->route('admin.csrs.index')->with('success', 'CSR deleted successfully!');
    }

    // Handle gallery image upload via dropzone
    public function uploadGallery(Request $request, Csr $csr)
    {
        $request->validate([
            'file' => 'required|image|max:5120',
        ]);

        $path = $request->file('file')->store('csr/gallery', 'public');

        $item = Gallery::create([
            'image' => $path,
            'is_active' => true,
            'context_type' => 'csr',
            'context_slug' => (string)$csr->id,
        ]);

        return response()->json([
            'status' => 'ok',
            'id' => $item->id,
            'url' => asset('storage/'.$item->image),
        ]);
    }

    // Delete gallery image
    public function deleteGalleryImage(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return back()->with('success', 'Image deleted successfully!');
    }
}

