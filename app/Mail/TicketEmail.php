<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\PDF;
use App\Models\User;
use App\Models\Event;

class TicketEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $event;
    public $pdf;

    public function __construct(?User $user = null)
    {
        $this->user = $user;
    
    }

    public function build($user, $event, $pdf)
{
    return $this->from('noreply@yourdomain.com')
                ->to($user->email, $user->name)
                ->subject('Your Ticket for ' . $event->title)
                ->attachData($pdf->output(), 'ticket.pdf', ['mime' => 'application/pdf'])
                ->view('emails.ticket', compact('user', 'event'));
}
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ticket Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket',
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
