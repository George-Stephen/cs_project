<?php

namespace App\Mail;

use App\Models\study_group;
use App\Models\User;
use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudyGroupApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $studyGroup;
    public $applicant;
    public $creator;

    

    /**
     * Create a new message instance.
     */
    public function __construct(study_group $studyGroup, User $applicant, User $creator)
    {
        $this->studyGroup = $studyGroup;
        $this->applicant = $applicant;
        $this->creator = $creator;
    }

    public function build()
    {
        

        $approvalLink = route('study-groups.approve-form', [
            'studyGroup' => $this->studyGroup,
            'applicant' => $this->applicant,
        ]);
        
        return $this->subject('Study Group Application')
            ->markdown('emails.study-group-application')
            ->with('approvalLink', $approvalLink);
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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
