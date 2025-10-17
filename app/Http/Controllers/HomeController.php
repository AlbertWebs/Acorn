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

    public function show($slug){
        $blogs = \App\Models\Blog::where('slug', $slug)->first();
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

}
