<?php

namespace App\Listeners;

use App\Events\InquiryCreated;
use App\Mail\EmailAdminMail;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailAdminListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\InquiryCreated  $event
     * @return void
     */
    public function handle(InquiryCreated $event)
    {
        $inquiry = $event->inquiry;
        User::all()->each(function (User $user) use ($inquiry) {
            Mail::to($user)->send(new EmailAdminMail($inquiry));
        });
    }
}
