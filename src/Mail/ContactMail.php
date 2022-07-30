<?php

namespace Suraj\Contact\Mail;

use Suraj\Contact\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $enquiry;
    public function __construct(Contact $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contact::emails.contact_email')
            ->with([
                'email_id' => $this->enquiry->email_id,
                'mobile_number' => $this->enquiry->mobile_number,
            ]);
    }
}
