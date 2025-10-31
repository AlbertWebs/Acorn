<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $fromEmail;
    public $fromName;
    public $replyToEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $message, $fromEmail = null, $fromName = null, $replyTo = null)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->fromEmail = $fromEmail ?? config('mail.from.address', 'noreply@acorn.co.ke');
        $this->fromName = $fromName ?? config('mail.from.name', 'Acorn Special Tutorials');
        $this->replyToEmail = $replyTo ?? $this->fromEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
            from: new Address($this->fromEmail, $this->fromName),
            replyTo: [$this->replyToEmail],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-notification',
            with: [
                'subject' => $this->subject,
                'messageContent' => $this->message,
                'fromName' => $this->fromName,
                'fromEmail' => $this->fromEmail,
            ]
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
