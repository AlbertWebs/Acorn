<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::latest()->get();
        return view('admin.about.core-values.index', compact('coreValues'));
    }

    public function create()
    {
        return view('admin.about.core-values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        CoreValue::create($request->only(['title', 'description']));

        return redirect()->route('admin.core-values.index')
                         ->with('success', 'Core value added successfully.');
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.about.core-values.edit', compact('coreValue'));
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $coreValue->update($request->only(['title', 'description']));

        return redirect()->route('admin.core-values.index')
                         ->with('success', 'Core value updated successfully.');
    }

    public function destroy(CoreValue $coreValue)
    {
        $coreValue->delete();

        return redirect()->route('admin.core-values.index')
                         ->with('success', 'Core value deleted.');
    }
}
