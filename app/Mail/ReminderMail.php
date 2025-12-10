<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $piutang;

    public function __construct($piutang)
    {
        $this->piutang = $piutang;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reminder Pembayaran Outstanding',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reminder',
            with: [
                'piutang' => $this->piutang
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
