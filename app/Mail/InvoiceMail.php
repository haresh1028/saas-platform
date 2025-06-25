<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Subscription;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Subscription $subscription) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Subscription Invoice'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice',
            with: ['subscription' => $this->subscription]
        );
    }

    // Optional: if you have any PDF or attachments
    public function attachments(): array
    {
        return [];
    }
}
