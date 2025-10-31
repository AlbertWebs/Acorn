<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\AdminNotificationMail;

class MessageController extends Controller
{
    /**
     * Send a message to albertmuhatia@gmail.com
     * 
     * Accepts POST requests with:
     * - subject (required)
     * - message (required)
     * - from_email (optional, defaults to app email)
     * - from_name (optional)
     * - reply_to (optional)
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'from_email' => 'nullable|email|max:255',
            'from_name' => 'nullable|string|max:255',
            'reply_to' => 'nullable|email|max:255',
        ]);

        try {
            $fromEmail = $validated['from_email'] ?? config('mail.from.address', 'noreply@acorn.co.ke');
            $fromName = $validated['from_name'] ?? config('mail.from.name', 'Acorn Special Tutorials');
            $replyTo = $validated['reply_to'] ?? $fromEmail;

            // Send email using the mailable
            Mail::to('albertmuhatia@gmail.com')
                ->send(new AdminNotificationMail(
                    $validated['subject'],
                    $validated['message'],
                    $fromEmail,
                    $fromName,
                    $replyTo
                ));

            Log::info('Message sent to albertmuhatia@gmail.com', [
                'subject' => $validated['subject'],
                'from_email' => $fromEmail,
                'from_name' => $fromName
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Message sent successfully to albertmuhatia@gmail.com'
            ], 200);

        } catch (\Exception $e) {
            Log::error('Failed to send message to albertmuhatia@gmail.com', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'subject' => $validated['subject'] ?? null
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send message. Please try again later.'
            ], 500);
        }
    }

    /**
     * Simple method to send a quick notification
     * Can be called from anywhere in the application
     */
    public static function sendQuickNotification($subject, $message, $fromEmail = null, $fromName = null)
    {
        try {
            $fromEmail = $fromEmail ?? config('mail.from.address', 'noreply@acorn.co.ke');
            $fromName = $fromName ?? config('mail.from.name', 'Acorn Special Tutorials');

            Mail::to('albertmuhatia@gmail.com')
                ->send(new AdminNotificationMail(
                    $subject,
                    $message,
                    $fromEmail,
                    $fromName,
                    $fromEmail
                ));

            Log::info('Quick notification sent to albertmuhatia@gmail.com', [
                'subject' => $subject
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send quick notification', [
                'error' => $e->getMessage(),
                'subject' => $subject
            ]);
            return false;
        }
    }
}

