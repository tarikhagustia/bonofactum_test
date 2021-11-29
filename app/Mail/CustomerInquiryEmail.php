<?php

namespace App\Mail;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class CustomerInquiryEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inquiry;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.customer-inquiry-email')->with('inquiry', $this->inquiry)
            ->with('url', $this->generateSignedUrl());
    }

    protected function generateSignedUrl()
    {
        // TODO : Generate signed URL
        return URL::temporarySignedRoute('inquiry.show', now()->addMonth(1), [
            'inquiry' => $this->inquiry->id
        ]);
    }
}
