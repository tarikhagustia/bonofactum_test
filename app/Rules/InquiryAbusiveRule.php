<?php

namespace App\Rules;

use App\Models\Inquiry;
use Illuminate\Contracts\Validation\Rule;

/**
 * This call to handle abusive user by repeating their request in 10 sec. This validation based on email address and ip address
 */
class InquiryAbusiveRule implements Rule
{
    protected $timeDiff;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($inquiry = Inquiry::where('ip_address', request()->ip())->first()) {
            // exist make sure to check time diff (10 sec)
            $this->timeDiff = now()->diffInSeconds($inquiry->created_at);
            if ($this->timeDiff < 10) {
                return false;
            } else {
                return true;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cannot request this inquiry, please wait at least 10 seconds';
    }
}
