<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\Admin\FounderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MpesaStkPaymentController;
use App\Http\Controllers\Admin\MpesaC2bPaymentController;
use App\Http\Controllers\Admin\PurposeController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;




use App\Http\Controllers\SubscriberPostController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about-us');
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us-alt');
Route::get('/eva-naputuni-nyoike', [HomeController::class, 'director'])->name('the-director');
Route::get('/our-story', [HomeController::class, 'story'])->name('our-story');
Route::get('/our-history', [HomeController::class, 'history'])->name('our-history');
Route::get('/our-history/{id}', [HomeController::class, 'history_single'])->name('our-history-single');

Route::get('/services/{slug}', [HomeController::class, 'services_single'])->name('services-single');
Route::get('/services', [HomeController::class, 'services'])->name('frontend.services');


Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact-us');
Route::get('/contact-store', [HomeController::class, 'contact_store'])->name('contact.store');

// webinars
Route::get('/webinars', [HomeController::class, 'webinars'])->name('webinars');

// events
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/events/{slug}', [HomeController::class, 'event_show'])->name('events.show');
Route::post('/events/book', [\App\Http\Controllers\EventRegistrationController::class, 'store'])->name('events.book');

// calendar
Route::get('/our-calendar', [HomeController::class, 'calendar'])->name('calendar');
Route::get('/trainings', [HomeController::class, 'trainings'])->name('trainings');

// gallery (frontend)
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{type}/{slug?}', [HomeController::class, 'gallery_context'])->name('gallery.context');






Route::get('/updates', [HomeController::class, 'updates'])->name('updates');
Route::get('/updates/{slung}', [HomeController::class, 'show'])->name('blog.show');

Route::post('/send-message', [HomeController::class, 'contactFormSubmit'])->name('contact.submit');
Route::post('/homepage-contact', [HomeController::class, 'homepageContactSubmit'])->name('homepage.contact.submit');
Route::post('/subscribe/ajax', [SubscriberPostController::class, 'ajaxStore'])->name('subscribe.ajax');

Route::get('/book-consultation', [HomeController::class, 'consultation'])->name('book-consultation');
Route::post('/book-consultation-submit', [BookingController::class, 'submit'])->name('book-consultation.submit');

// New route for payment page
Route::get('/booking/{booking}/payment', [BookingController::class, 'showPaymentPage'])->name('booking.payment');
Route::post('/booking/{booking}/payment', [BookingController::class, 'processPayment'])->name('booking.payment.submit');
Route::get('/booking/{booking}/payment/status', [BookingController::class, 'paymentStatus'])->name('booking.payment.status');
Route::get('/payment/thank-you/{booking}', [BookingController::class, 'thankYou'])->name('payment.thank-you');
Route::get('/payment/receipt/{booking}', [BookingController::class, 'receipt'])->name('payment.receipt');
// M-Pesa STK callback (sandbox)
Route::post('/mpesa/stk/callback', [MpesaController::class, 'stkCallback'])->name('mpesa.stk.callback');
Route::post('/subscribe', [App\Http\Controllers\SubscriberPostController::class, 'store'])->name('subscribe');


// ====================
// ADMIN AUTH
// ====================
Route::get('admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.attempt');
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
// ====================
// PROTECTED ADMIN AREA
// ====================
Route::middleware(['auth','is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // About Us (simple info/editable)
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::get('/purpose', [PurposeController::class, 'edit'])->name('purpose.edit');
    Route::put('/purpose/{id}', [PurposeController::class, 'update'])->name('purpose.update');


    // Clients CRUD
    Route::resource('clients', App\Http\Controllers\Admin\ClientController::class)->names('clients');

    Route::resource('core-values', CoreValueController::class)->except(['show'])->names('core-values');


    // Bookings CRUD
    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class);

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    Route::resource('history', App\Http\Controllers\Admin\HistoryController::class);


    // Reports
    Route::get('/payments', [ReportController::class, 'payments'])->name('payments.index');

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    // Users management
    Route::resource('users', UserController::class);

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

       // NEW: KYC
    Route::get('/kyc', [KycController::class, 'index'])->name('kyc.index');
    Route::get('/kyc/create', [KycController::class, 'create'])->name('kyc.create');
    Route::post('/kyc', [KycController::class, 'store'])->name('kyc.store');
    Route::get('/kyc/{kyc}', [KycController::class, 'show'])->name('kyc.show');
    Route::put('/kyc/{kyc}/status', [KycController::class, 'updateStatus'])->name('kyc.updateStatus');
    Route::post('/kyc/liveliness/upload', [KycController::class, 'uploadLiveliness'])->name('kyc.liveliness.upload');


    // NEW: Subscribers
    Route::resource('subscribers', App\Http\Controllers\Admin\SubscriberController::class);

    // NEW: SMS
    Route::resource('sms', App\Http\Controllers\Admin\SmsController::class);

    // NEW: Client Feedbacks
    Route::resource('feedbacks', App\Http\Controllers\Admin\FeedbackController::class);

    // NEW: Blog
    Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);

    // NEW: Event Registrations
    Route::get('event-registrations', [\App\Http\Controllers\Admin\EventRegistrationController::class, 'index'])->name('event-registrations.index');
    Route::get('events/{event}/registrations', [\App\Http\Controllers\Admin\EventRegistrationController::class, 'byEvent'])->name('events.registrations');

    // NEW: Webinars & Events
    Route::resource('webinars', WebinarController::class);
    Route::resource('events', EventController::class);

    // NEW: Galleries (admin)
    Route::resource('galleries', GalleryController::class)->names('galleries');
    Route::post('galleries/upload', [GalleryController::class, 'upload'])->name('galleries.upload');

    // NEW: Notifications
    Route::resource('notifications', \App\Http\Controllers\Admin\NotificationController::class);

    Route::get('/legals', [LegalController::class, 'index'])->name('legals.index');
    Route::get('/legals/{page}/edit', [LegalController::class, 'edit'])->name('legals.edit');
    Route::put('/legals/{page}', [LegalController::class, 'update'])->name('legals.update');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

    Route::resource('carousel', CarouselController::class)->names('carousel');

    // Admin routes (you can protect them with middleware)
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/update', [AboutController::class, 'update'])->name('about.update');

    Route::resource('faq', FaqController::class)->names('faq');
    Route::resource('fleets', FleetController::class)->names('fleets');

    Route::resource('services', ServiceController::class)->names('services');



    Route::get('/admin/founder', [FounderController::class, 'edit'])->name('founder.edit');
    Route::put('/admin/founder', [FounderController::class, 'update'])->name('founder.update');
    Route::get('/about-founder', [FounderController::class, 'show'])->name('founder.show');



    Route::prefix('billing')->group(function () {
        // Create Invoice Page
        Route::get('/create', [App\Http\Controllers\Admin\InvoiceController::class, 'create'])
            ->name('invoices.create');

        Route::get('/index', [App\Http\Controllers\Admin\InvoiceController::class, 'index'])
            ->name('invoices.index');
        Route::get('/invoices/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'show'])
            ->name('invoices.show');

        Route::get('/invoices/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit'); // 👈 add this
        Route::put('/invoices/{id}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
        Route::get('/invoices/{id}/print', [InvoiceController::class, 'print'])
            ->name('invoices.print');
        Route::post('/invoices/{id}/send-sms', [InvoiceController::class, 'sendSms'])
        ->name('invoices.send-sms');


        // Store Invoice
        Route::post('/store', [App\Http\Controllers\Admin\InvoiceController::class, 'store'])
            ->name('invoices.store');



        Route::prefix('payments')->middleware(['auth'])->group(function () {
            Route::get('stk', [MpesaStkPaymentController::class, 'index'])->name('payments.stk.index');
            Route::get('stk/{payment}', [MpesaStkPaymentController::class, 'show'])->name('payments.stk.show');
            Route::delete('stk/{payment}', [MpesaStkPaymentController::class, 'destroy'])->name('payments.stk.destroy');

            Route::get('c2b', [MpesaC2bPaymentController::class, 'index'])->name('payments.c2b.index');
            Route::get('c2b/{payment}', [MpesaC2bPaymentController::class, 'show'])->name('payments.c2b.show');
            Route::delete('c2b/{payment}', [MpesaC2bPaymentController::class, 'destroy'])->name('payments.c2b.destroy');
        });
    });

});

// ====================
// USER AREA
// ====================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
