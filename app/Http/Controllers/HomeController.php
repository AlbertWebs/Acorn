<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Fleet;
use App\Models\Client;
use App\Models\Service;
use App\Models\Feedback;


class HomeController extends Controller
{
    public function index()
    {
        $page_title = "Home";
        $clients = Client::all(); // or ->where('status', 1)->get();
        $carousels = \App\Models\Carousel::all();
        $Settings = \App\Models\Setting::first();
        $Services = \App\Models\Service::limit('3')->get();
        // $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
        $About = \App\Models\About::first();
        $faqs = \App\Models\Faq::where('is_active', true)->get();
        $blogs = \App\Models\Blog::latest()->take(6)->get();
        $feedbacks = Feedback::where('is_active', true)->latest()->get();
        return view('frontend.home', compact('feedbacks','Services','clients','carousels', 'Settings','About','faqs','feedbacks','blogs','page_title'));
    }

    public function about()
    {
        $faqs = \App\Models\Faq::where('is_active', true)->get();
        $blogs = \App\Models\Blog::latest()->take(6)->get();
        $clients = \App\Models\Client::all();
        $page_title = "About Us";
        $About = \App\Models\About::first();
        $Founder = \App\Models\Founder::first();
        $Settings = \App\Models\Setting::first();
        $testimonials  = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.about', compact('faqs','About','testimonials','page_title','Settings','blogs','clients','Founder'));
    }

        public function history()
    {
        $histories = \App\Models\History::orderBy('order', 'asc')->get();
        $faqs = \App\Models\Faq::where('is_active', true)->get();
        $blogs = \App\Models\Blog::latest()->take(6)->get();
        $clients = \App\Models\Client::all();
        $page_title = "About Us";
        $About = \App\Models\About::first();
        $Founder = \App\Models\Founder::first();
        $Settings = \App\Models\Setting::first();
        $testimonials  = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.history', compact('histories','faqs','About','testimonials','page_title','Settings','blogs','clients','Founder'));
    }

            public function history_single($id)
    {
        $histories = \App\Models\History::where('id',$id)->orderBy('order', 'asc')->first();
        $faqs = \App\Models\Faq::where('is_active', true)->get();
        $blogs = \App\Models\Blog::latest()->take(6)->get();
        $clients = \App\Models\Client::all();
        $page_title = "About Us";
        $About = \App\Models\About::first();
        $Founder = \App\Models\Founder::first();
        $Settings = \App\Models\Setting::first();
        $testimonials  = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.histories', compact('histories','faqs','About','testimonials','page_title','Settings','blogs','clients','Founder'));
    }



            public function director()
    {
        $histories = \App\Models\History::orderBy('order', 'asc')->get();
        $faqs = \App\Models\Faq::where('is_active', true)->get();
        $blogs = \App\Models\Blog::latest()->take(6)->get();
        $clients = \App\Models\Client::all();
        $page_title = "About Us";
        $About = \App\Models\About::first();
        $founder = \App\Models\Founder::first();
        $Settings = \App\Models\Setting::first();
        $testimonials  = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.director', compact('histories','faqs','About','testimonials','page_title','Settings','blogs','clients','founder'));
    }


     public function contact()
        {
            $page_title = "Contact Us";
            $About = \App\Models\About::first();
            // $teams = \App\Models\Team::where('is_active', true)->get();
            $Settings = \App\Models\Setting::first();
            $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
            return view('frontend.contact', compact('About', 'feedbacks','Settings','page_title'));
        }

    public function consultation()
        {
            $page_title = "Book Cosultation";
            $About = \App\Models\About::first();
            $Services =  \App\Models\Service::latest()->get();
            // $teams = \App\Models\Team::where('is_active', true)->get();
            $Settings = \App\Models\Setting::first();
            $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
            return view('frontend.consultation', compact('Services','About', 'feedbacks','Settings','page_title'));
        }



    public function updates()
    {
        $blogs = \App\Models\Blog::latest()->paginate(12);
        $page_title = "Updates and Events";
        $About = \App\Models\About::first();
        // $teams = \App\Models\Team::where('is_active', true)->get();
        $Settings = \App\Models\Setting::first();
        $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.updates', compact('blogs', 'feedbacks','Settings','page_title'));
    }

    public function webinars()
    {
        $webinars = \App\Models\Webinar::latest()->paginate(12);
        $page_title = "Webinars";
        $About = \App\Models\About::first();
        $Settings = \App\Models\Setting::first();
        $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.webinars', compact('webinars', 'feedbacks','Settings','page_title'));
    }

    public function events()
    {
        $events = \App\Models\Event::latest()->paginate(12);
        $page_title = "Events";
        $About = \App\Models\About::first();
        $Settings = \App\Models\Setting::first();
        $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.events', compact('events', 'feedbacks','Settings','page_title'));
    }

    public function event_show($slug)
    {
        $event = \App\Models\Event::where('slug', $slug)->firstOrFail();
        $page_title = $event->title;
        $Settings = \App\Models\Setting::first();
        $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.event', compact('event','Settings','feedbacks','page_title'));
    }

    public function show($slug){
        $blogs = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        $page_title = "Contact Us";
        $About = \App\Models\About::first();
        // $teams = \App\Models\Team::where('is_active', true)->get();
        $Settings = \App\Models\Setting::first();
        $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.update', compact('blogs', 'feedbacks','Settings','page_title'));
    }




    public function services_single($slug)
    {
        $page_title = "Services";
        $service = \App\Models\Service::where('slug', $slug)->firstOrFail();
        $Settings = \App\Models\Setting::first();
        $feedbacks = \App\Models\Feedback::latest()->take(10)->get();

        // Fetch next and previous services
        $next = \App\Models\Service::where('id', '>', $service->id)->orderBy('id', 'asc')->first();
        $previous = \App\Models\Service::where('id', '<', $service->id)->orderBy('id', 'desc')->first();

        return view('frontend.services_single', compact('feedbacks', 'Settings', 'page_title', 'service', 'next', 'previous'));
    }

    public function show_single_fleets($car,$slug){
        $car = \App\Models\Car::where('slug', $slug)->first();
        $Fleet = \App\Models\Fleet::where('slug', $slug)->first();

        $page_title = "Fleet";
        $About = \App\Models\About::first();
        // $teams = \App\Models\Team::where('is_active', true)->get();
        $Settings = \App\Models\Setting::first();
        $feedbacks = \App\Models\Feedback::latest()->take(10)->get();
        return view('frontend.show_single_fleets', compact('feedbacks','Settings','page_title','car','Fleet'));
    }



    public function generateSlugs()
    {
        $fleets = Fleet::whereNull('slug')->orWhere('slug', '')->get();

        foreach ($fleets as $fleet) {
            $fleet->slug = Str::slug($fleet->name . '-' . $fleet->id);
            $fleet->save();
        }

        return redirect()->back()->with('success', 'Fleet slugs generated successfully.');
    }

    public function contactFormSubmit(Request $request)
    {
        // 1. Validate the incoming data
        // NOTE: This server-side validation is CRITICAL for security
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'number'  => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Prepare and Send the Email
        try {
            // Using the Mail facade to send a simple email (adjust as needed for a custom Mailable)
            Mail::raw("New Contact Form Submission:\n\n" .
                      "Name: " . $validated['name'] . "\n" .
                      "Email: " . $validated['email'] . "\n" .
                      "Mobile: " . $validated['number'] . "\n" .
                      "Company: " . ($validated['company'] ?? 'N/A') . "\n" .
                      "Message: " . $validated['message'],
                function ($message) use ($validated) {
                    $message->to('admin@nuhigreattravels.com')
                    ->cc('albertmuhatia@gmail.com')->subject('New Contact Inquiry from ' . $validated['name'])
                            ->from($validated['email'], $validated['name']);
            });

            // 3. Return a successful JSON response
            return response()->json([
                'status'  => 'success',
                'message' => 'Your message has been sent successfully!'
            ]);

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Contact form submission failed: ' . $e->getMessage());

            // 4. Return an error JSON response
            return response()->json([
                'status'  => 'error',
                'message' => 'Sorry, there was an issue sending your message. Please try again later.'
            ], 500); // HTTP 500 status for server error
        }
    }

    /**
     * Handle homepage contact form submission with spam protection
     */
    public function homepageContactSubmit(Request $request)
    {
        // 1. Rate limiting check (max 3 submissions per IP per hour)
        $ip = $request->ip();
        $key = 'contact_form_' . $ip;
        $submissions = \Cache::get($key, 0);
        
        if ($submissions >= 3) {
            return response()->json([
                'status' => 'error',
                'message' => 'Too many submissions. Please wait before trying again.'
            ], 429);
        }

        // 2. Honeypot spam protection
        if ($request->filled('website') || $request->filled('url')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Spam detected.'
            ], 400);
        }

        // 3. Validate the incoming data
        $validated = $request->validate([
            'cfName3'    => 'required|string|max:255',
            'cfEmail3'   => 'required|email|max:255',
            'cfPhone3'   => 'required|string|max:20',
            'cfSubject3' => 'required|integer|exists:services,id',
            'cfMessage3' => 'required|string|min:10|max:2000',
        ], [
            'cfName3.required' => 'Full name is required.',
            'cfEmail3.required' => 'Email address is required.',
            'cfEmail3.email' => 'Please enter a valid email address.',
            'cfPhone3.required' => 'Phone number is required.',
            'cfSubject3.required' => 'Please select a service.',
            'cfSubject3.exists' => 'Please select a valid service.',
            'cfMessage3.required' => 'Message is required.',
            'cfMessage3.min' => 'Message must be at least 10 characters.',
            'cfMessage3.max' => 'Message must not exceed 2000 characters.',
        ]);

        // 4. Get service name
        $service = \App\Models\Service::find($validated['cfSubject3']);
        $serviceName = $service ? $service->title : 'Unknown Service';

        // 5. Increment submission counter
        \Cache::put($key, $submissions + 1, 3600); // 1 hour

        // 6. Send email notification
        try {
            $settings = \App\Models\Setting::first();
            $adminEmail = $settings->email ?? 'info@acorn.co.ke';

            Mail::raw("New Contact Form Submission from Homepage:\n\n" .
                      "Name: " . $validated['cfName3'] . "\n" .
                      "Email: " . $validated['cfEmail3'] . "\n" .
                      "Phone: " . $validated['cfPhone3'] . "\n" .
                      "Service Interest: " . $serviceName . "\n" .
                      "Message: " . $validated['cfMessage3'] . "\n\n" .
                      "IP Address: " . $ip . "\n" .
                      "Submitted at: " . now()->format('Y-m-d H:i:s'),
                function ($message) use ($validated, $adminEmail) {
                    $message->to($adminEmail)
                            ->subject('New Contact Inquiry from ' . $validated['cfName3'])
                            ->from($validated['cfEmail3'], $validated['cfName3']);
                });

            // 7. Log successful submission
            \Log::info('Homepage contact form submitted successfully', [
                'name' => $validated['cfName3'],
                'email' => $validated['cfEmail3'],
                'service' => $serviceName,
                'ip' => $ip
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Thank you! Your message has been sent successfully. We will get back to you soon.'
            ]);

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Homepage contact form submission failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Sorry, there was an issue sending your message. Please try again later or contact us directly.'
            ], 500);
        }
    }

}
