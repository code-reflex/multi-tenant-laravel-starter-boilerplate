<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    private $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //$token = Password::broker()->createToken($notifiable);
        $hostname = \Hyn\Tenancy\Facades\TenancyFacade::hostname();
        $resetUrl = "http://{$hostname->fqdn}/password/reset/{$this->token}";
        $app = config('app.name');
        $from = 'no-reply@'.$hostname->fqdn;

        return (new MailMessage())
            ->subject("{$hostname->logo} : Password Reset Notification")
            ->from($from)
            ->greeting("Hello {$notifiable->name},")
            ->line("You are receiving this email because we received a password reset request for your account.")
            ->action('Reset password', $resetUrl)            
            ->line("If you did not request a password reset, no further action is required.");
    }

}
