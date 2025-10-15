<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Traffic;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       // Visits per day (last 7 days)
        $visitsPerDay = Traffic::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
        ->groupBy('date')
        ->orderBy('date')
        ->take(7)
        ->pluck('total', 'date');

        // Device usage
        $devices = Traffic::select('device', DB::raw('count(*) as total'))
            ->groupBy('device')
            ->pluck('total', 'device');

        // Browser usage
        $browsers = Traffic::select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->pluck('total', 'browser');

        // Top visited pages
        $pages = Traffic::select('url', DB::raw('count(*) as total'))
            ->groupBy('url')
            ->orderByDesc('total')
            ->take(5)
            ->pluck('total', 'url');

        return view('admin.dashboard', compact('visitsPerDay', 'devices', 'browsers', 'pages'));
    }
}
