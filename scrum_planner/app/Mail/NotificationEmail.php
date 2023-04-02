<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\MeetingAttendant;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationEmail extends Mailable
{
    protected Meeting $meeting;
    protected User $attendant;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        Meeting $meeting,
        User $attendant
        )
    {
        $this->meeting = $meeting;
        $this->attendant = $attendant;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Added to a new meeting',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.created_meeting',
            with: [
                'meetingName' => $this->meeting->name,
                'startTime' => $this->meeting->start_time,
                'endTime' => $this->meeting->end_time,
                'organiser' => $this->meeting->organiser,
                'description' => $this->meeting->description,
                'siteName' => env('APP_NAME'),
                'userName' => $this->attendant->user_id
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
