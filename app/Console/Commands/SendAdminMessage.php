<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\AdminNotificationMail;

class SendAdminMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:send-message 
                            {subject : The email subject}
                            {message : The email message content}
                            {--from-email= : Optional sender email address}
                            {--from-name= : Optional sender name}
                            {--reply-to= : Optional reply-to email address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email message to albertmuhatia@gmail.com';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subject = $this->argument('subject');
        $message = $this->argument('message');
        $fromEmail = $this->option('from-email') ?? config('mail.from.address', 'noreply@acorn.co.ke');
        $fromName = $this->option('from-name') ?? config('mail.from.name', 'Acorn Special Tutorials');
        $replyTo = $this->option('reply-to') ?? $fromEmail;

        $this->info('Sending email to albertmuhatia@gmail.com...');
        $this->line('');
        $this->line('Subject: ' . $subject);
        $this->line('From: ' . $fromName . ' <' . $fromEmail . '>');
        $this->line('Reply-To: ' . $replyTo);
        $this->line('Message: ' . substr($message, 0, 100) . (strlen($message) > 100 ? '...' : ''));
        $this->line('');

        try {
            Mail::to('albertmuhatia@gmail.com')
                ->send(new AdminNotificationMail(
                    $subject,
                    $message,
                    $fromEmail,
                    $fromName,
                    $replyTo
                ));

            Log::info('Admin message sent via command', [
                'subject' => $subject,
                'from_email' => $fromEmail,
                'from_name' => $fromName
            ]);

            $this->info('✓ Email sent successfully to albertmuhatia@gmail.com');
            return Command::SUCCESS;

        } catch (\Exception $e) {
            Log::error('Failed to send admin message via command', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'subject' => $subject
            ]);

            $this->error('✗ Failed to send email: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
