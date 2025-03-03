<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $user_password, $token, $settings;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $user_password, $token, $settings = null)
    {
        $this->user = $user;
        $this->user_password = $user_password;
        $this->token = $token;
        $this->settings = $settings;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registration',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'auth.mail.registration',
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
