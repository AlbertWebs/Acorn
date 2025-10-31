<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\MpesaStkPayment;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $invoice;
    public $payment;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, Invoice $invoice, MpesaStkPayment $payment)
    {
        $this->booking = $booking;
        $this->invoice = $invoice;
        $this->payment = $payment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Confirmation - Invoice #' . $this->invoice->invoice_number,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.payment-confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
