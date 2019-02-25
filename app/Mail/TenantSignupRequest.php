<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenantSignupRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $tenantData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tenantData)
    {
        $this->tenantData = $tenantData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@'.config('app.url_base'))
            ->view('emails.tenantRegistrationMail');
    }
}
