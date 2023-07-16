<?php

namespace App\Mail;

use App\Models\study_group;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudyGroupApproval extends Mailable
{
    use Queueable, SerializesModels;

    public $studyGroup;
    public $applicant;

    /**
     * Create a new message instance.
     */
    public function __construct(study_group $studyGroup, User $applicant)
    {
        $this->studyGroup = $studyGroup;
        $this->applicant = $applicant;
    }

    public function build()
    {

        return $this->markdown('emails.study-group-approval')
            ->subject('Study Group Application Approved')
            ->with('studyGroup', $this->studyGroup);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Study Group Approval',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
