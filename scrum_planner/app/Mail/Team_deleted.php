<?php

namespace App\Mail;

use App\Models\Team;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Team_deleted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    private Team $team;
    private User $member;
    public function __construct(Team $team, User $member)
    {
        $this->team = $team;
        $this->member = $member;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Team Deleted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.team_deleted',
            with: [
                'userName' => $this->member->full_name,
                'teamName' => $this->team->team_name,
                'scrumMaster' => $this->team->scrumMaster->full_name,
                'siteName' => env('APP_NAME')
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
