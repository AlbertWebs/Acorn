<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::orderBy('order')->get();
        return view('admin.history.index', compact('histories'));
    }

    public function create()
    {
        return view('admin.history.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:32',
            'step_number' => 'nullable|string',
            'meta' => 'nullable|string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_one' => 'nullable|image',
            'image_two' => 'nullable|image',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_one')) {
            $validated['image_one'] = $request->file('image_one')->store('history', 'public');
        }

        if ($request->hasFile('image_two')) {
            $validated['image_two'] = $request->file('image_two')->store('history', 'public');
        }

        History::create($validated);
        return redirect()->route('admin.history.index')->with('success', 'History added successfully.');
    }

    public function edit(History $history)
    {
        return view('admin.history.edit', compact('history'));
    }

    public function update(Request $request, History $history)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:32',
            'meta' => 'nullable|string',
            'step_number' => 'nullable|string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_one' => 'nullable|image',
            'image_two' => 'nullable|image',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_one')) {
            $validated['image_one'] = $request->file('image_one')->store('history', 'public');
        }

        if ($request->hasFile('image_two')) {
            $validated['image_two'] = $request->file('image_two')->store('history', 'public');
        }

        $history->update($validated);
        return redirect()->route('admin.history.index')->with('success', 'History updated successfully.');
    }

    public function destroy(History $history)
    {
        $history->delete();
        return redirect()->route('admin.history.index')->with('success', 'History deleted successfully.');
    }
}
