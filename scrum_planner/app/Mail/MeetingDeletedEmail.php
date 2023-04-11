<?php

namespace App\Mail;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MeetingDeletedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    private User $user;
    private Meeting $meeting;
    public function __construct(User $user, Meeting $meeting)
    {
        $this->user = $user;
        $this->meeting = $meeting;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Meeting Deleted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.meeting_deleted',
            with: [
                'meetingName' => $this->meeting->name,
                'startTime' => $this->meeting->start_time,
                'endTime' => $this->meeting->end_time,
                'organiser' => $this->meeting->scrumMaster->full_name,
                'description' => $this->meeting->description,
                'siteName' => env('APP_NAME'),
                'userName' => $this->user->full_name
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
