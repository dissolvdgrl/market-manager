<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class ApplicationUpdated extends Notification
{
    use Queueable;

    protected $application;
    protected $user_name;

    /**
     * Create a new notification instance.
     */
    public function __construct($application, $user_name)
    {
        $this->application = $application;
        $this->user_name = $user_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $greeting = "Hello {$this->user_name},";
        $url = config('app.url') . '/login';
        $terms = config('app.url') . '/terms-of-service';
        return (new MailMessage)
            ->subject('Banting Market Application Updated')
            ->greeting($greeting)
            ->line("Your application to become a vendor at Brooklyn's Banting Market has been updated.")
            ->line("To manage your Brooklyn Banting Market vendor account, click the button below or copy and paste the URL provided into your browser.")
            ->action('Log in', $url)
            ->line("Make sure you have familiarised yourself with the market rules before booking your space.")
            ->action('View rules', $terms)
            ->line('Please do not hesitate to contact us if you have any questions or concerns.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
