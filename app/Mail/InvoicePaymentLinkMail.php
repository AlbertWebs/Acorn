<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoicePaymentLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public Invoice $invoice;
    public ?Booking $booking;
    public string $paymentUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(Invoice $invoice, ?Booking $booking, string $paymentUrl)
    {
        $this->invoice = $invoice;
        $this->booking = $booking;
        $this->paymentUrl = $paymentUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $number = $this->invoice->invoice_number ?? ('INV-' . str_pad((string) $this->invoice->id, 4, '0', STR_PAD_LEFT));

        return new Envelope(
            subject: 'Payment Link for Invoice ' . $number,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice-payment-link',
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

