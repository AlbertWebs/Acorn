<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|date',
            'event_time' => ['nullable','regex:/^([0-1]?\\d|2[0-3]):[0-5]\\d$/'],
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('events', 'public');
        }

        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->boolean('is_published');
        if ($request->filled('event_date')) {
            $data['event_date'] = $request->date('event_date');
        }
        if ($request->filled('event_time')) {
            $data['event_time'] = self::normalizeTime($request->input('event_time'));
        }
        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|date',
            'event_time' => ['nullable','regex:/^([0-1]?\\d|2[0-3]):[0-5]\\d$/'],
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($event->featured_image) {
                Storage::disk('public')->delete($event->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('events', 'public');
        }

        if ($request->filled('title')) {
            $data['slug'] = Str::slug($request->title);
        }
        $data['is_published'] = $request->boolean('is_published');
        if ($request->filled('event_date')) {
            $data['event_date'] = $request->date('event_date');
        }
        // Allow setting or clearing event_time
        $data['event_time'] = $request->filled('event_time') ? self::normalizeTime($request->input('event_time')) : null;
        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    private static function normalizeTime(?string $t): ?string
    {
        if ($t === null || $t === '') return null;
        if (preg_match('/^(\d{2}):(\d{2})(?::\d{2})?$/', $t, $m)) {
            return sprintf('%02d:%02d', (int)$m[1], (int)$m[2]);
        }
        if (preg_match('/^(\d{1,2}):(\d{2})$/', $t, $m)) {
            return sprintf('%02d:%02d', (int)$m[1], (int)$m[2]);
        }
        try {
            return Carbon::parse($t)->format('H:i');
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function destroy(Event $event)
    {
        if ($event->featured_image) {
            Storage::disk('public')->delete($event->featured_image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}


