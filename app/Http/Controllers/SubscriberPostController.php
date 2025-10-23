<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Subscriber;

class SubscriberPostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // ✅ Check if the email already exists
        if (Subscriber::where('email', $request->email)->exists()) {
            return back()->with('error', 'You are already subscribed!');
        }

        try {
            // ✅ Create a new subscriber
            $subscriber = Subscriber::create([
                'email' => $request->email,
                'is_active' => true,
            ]);
        } catch (QueryException $e) {
            // Handle unexpected DB errors
            return back()->with('error', 'Database error occurred.');
        }

        // ✅ Mailchimp credentials
        $apiKey = config('mailchimp.apiKey');
        $serverPrefix = config('mailchimp.serverPrefix');
        $listId = config('mailchimp.listId');

        // Check if credentials exist
        if (!$apiKey || !$serverPrefix || !$listId) {
            return back()->with('error', 'Mailchimp configuration missing.');
        }

        // ✅ Determine datacenter
        $dc = explode('-', $apiKey)[1] ?? $serverPrefix;

        // ✅ Subscribe to Mailchimp
        $response = Http::withBasicAuth('anystring', $apiKey)
            ->post("https://{$dc}.api.mailchimp.com/3.0/lists/{$listId}/members", [
                'email_address' => $request->email,
                'status' => 'subscribed',
            ]);

        // Handle Mailchimp errors
        if ($response->failed()) {
            return back()->with('error', 'Mailchimp subscription failed. Please try again later.');
        }

        return back()->with('success', 'Subscribed successfully!');
    }

    public function stores(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        // Store subscriber locally
        $subscriber = Subscriber::create([
            'email' => $request->email,
            'is_active' => true
        ]);
        // echo "<script>alert("/")</script>";

        try {
            $apiKey = env('MAILCHIMP_API_KEY');
            $listId = env('MAILCHIMP_LIST_ID');
            $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);

            $response = Http::withBasicAuth('anystring', $apiKey)
                ->post("https://{$dataCenter}.api.mailchimp.com/3.0/lists/{$listId}/members", [
                    'email_address' => $request->email,
                    'status' => 'subscribed'
                ]);

            if ($response->failed()) {
                // Log the Mailchimp error response
                Log::error('Mailchimp subscription failed', [
                    'email' => $request->email,
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return response()->json([
                    'message' => 'Saved locally, but Mailchimp subscription failed.'
                ], 200);
            }

            return response()->json(['message' => 'You have been subscribed successfully!']);
        } catch (\Exception $e) {
            // Log the exception details
            Log::error('Mailchimp API Exception', [
                'email' => $request->email,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function ajaxStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email,
            'is_active' => true
        ]);

        try {
            $apiKey = config('services.mailchimp.key');
            $listId = config('services.mailchimp.list_id');
            $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);

            $response = Http::withBasicAuth('anystring', $apiKey)
                ->post("https://{$dataCenter}.api.mailchimp.com/3.0/lists/{$listId}/members", [
                    'email_address' => $request->email,
                    'status' => 'subscribed',
                ]);

            if (!$response->successful()) {
                // Log non-successful Mailchimp responses
                Log::warning('Mailchimp sync failed', [
                    'email' => $request->email,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
            }
        } catch (\Exception $e) {
            // Log exceptions during Mailchimp sync
            Log::error('Mailchimp sync exception', [
                'email' => $request->email,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        return response()->json(['message' => 'Thank you for subscribing!']);
    }
}
