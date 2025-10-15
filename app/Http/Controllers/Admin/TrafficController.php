<?php

// app/Http/Controllers/Admin/TrafficController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Traffic;

class TrafficController extends Controller
{
    public function index()
    {
        $visitsPerDay = Traffic::selectRaw('DATE(created_at) as date, COUNT(*) as visits')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('visits', 'date');

        $browsers = Traffic::selectRaw('browser, COUNT(*) as total')
            ->groupBy('browser')
            ->pluck('total', 'browser');

        $devices = Traffic::selectRaw('device, COUNT(*) as total')
            ->groupBy('device')
            ->pluck('total', 'device');

        $pages = Traffic::selectRaw('page, COUNT(*) as total')
            ->groupBy('page')
            ->orderByDesc('total')
            ->take(5)
            ->pluck('total', 'page');

        return view('admin.dashboard', compact('visitsPerDay', 'browsers', 'devices', 'pages'));
    }
}
