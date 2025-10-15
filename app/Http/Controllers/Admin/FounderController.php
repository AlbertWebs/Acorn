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
        $founder = Founder::first();

        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'roles' => 'nullable|string',
            'about' => 'nullable|string',
            'catalyst_for_change' => 'nullable|string',
            'community_impact' => 'nullable|string',
            'leadership' => 'nullable|string',
        ]);

        $founder->update($request->all());

        return redirect()->route('admin.founder.edit')->with('success', 'Founder profile updated.');
    }

    public function show()
    {
        $founder = Founder::first();
        return view('admin.founder.show', compact('founder'));
    }
}
