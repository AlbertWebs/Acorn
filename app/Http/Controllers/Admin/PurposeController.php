<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purpose;

class PurposeController extends Controller
{
    public function edit()
    {
        $purpose = Purpose::firstOrFail();
        return view('admin.about.purpose', compact('purpose'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $purpose = Purpose::findOrFail($id);
        $purpose->update($request->only(['title', 'content']));

        return redirect()->back()->with('success', 'Purpose updated successfully.');
    }
}
