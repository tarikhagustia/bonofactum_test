<?php

namespace App\Listeners;

use App\Events\InquiryCreated;
use App\Mail\CustomerInquiryEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CustomerEmailListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\InquiryCreated  $event
     * @return void
     */
    public function handle(InquiryCreated $event)
    {
        Mail::to($event->inquiry->email)->send(new CustomerInquiryEmail($event->inquiry));
    }
}
