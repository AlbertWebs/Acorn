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

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        }

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
            'is_active' => 'nullable|boolean',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'exists:galleries,id',
        ]);

        // Handle PDF upload
        if ($request->hasFile('pdf_file')) {
            if ($csr->pdf_file) {
                Storage::disk('public')->delete($csr->pdf_file);
            }
            $data['pdf_file'] = $request->file('pdf_file')->store('csr/pdfs', 'public');
        } else {
            // Keep existing PDF if no new file uploaded
            unset($data['pdf_file']);
        }

        // Handle is_active checkbox
        $data['is_active'] = $request->has('is_active') && $request->is_active == '1' ? 1 : 0;

        // Generate slug if title changed (model boot will also handle this, but we do it here too for clarity)
        if (isset($data['title']) && $csr->title !== $data['title']) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        }

        // Update the model (the boot method will also regenerate slug if title changed)
        $csr->update($data);

        // Handle gallery images linking
        $selectedImageIds = $request->input('gallery_images', []);
        
        // Unlink all current CSR gallery images
        Gallery::where('context_type', 'csr')
            ->where('context_slug', (string)$csr->id)
            ->update([
                'context_type' => null,
                'context_slug' => null,
            ]);
        
        // Link selected images to this CSR
        if (!empty($selectedImageIds)) {
            Gallery::whereIn('id', $selectedImageIds)
                ->update([
                    'context_type' => 'csr',
                    'context_slug' => (string)$csr->id,
                ]);
        }

        return redirect()->route('admin.csrs.index')->with('success', 'CSR updated successfully!');
    }

    public function destroy(Csr $csr)
    {
        // Delete PDF file
        if ($csr->pdf_file) {
            Storage::disk('public')->delete($csr->pdf_file);
        }

        // Unlink associated gallery images (don't delete them, just unlink)
        Gallery::where('context_type', 'csr')
            ->where('context_slug', (string)$csr->id)
            ->update([
                'context_type' => null,
                'context_slug' => null,
            ]);

        $csr->delete();

        return redirect()->route('admin.csrs.index')->with('success', 'CSR deleted successfully!');
    }
}

