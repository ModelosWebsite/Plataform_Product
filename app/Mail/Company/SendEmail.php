<?php

namespace App\Mail\Company;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email, $companyEmail;
    /**
     * Create a new message instance.
     */
    public function __construct($email, $companyEmail)
    {
        //
        $this->email = $email;
        $this->companyEmail = $companyEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ajuda',
            from: new Address("albertocativa653@gmail.com", "Alberto"),
            replyTo: [
                new Address('albertocativa653@gmail.com', 'Alberto Otwell'),
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'sendemail.company',
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
