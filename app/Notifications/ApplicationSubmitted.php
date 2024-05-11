<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class ApplicationSubmitted extends Notification
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
        $url = url('/apply');
        return (new MailMessage)
            ->subject('Banting Market Application Details')
            ->greeting($greeting)
            ->line("We've received your application to sell at the market and it is currently being reviewed")
           ->line("You'll receive a notification like this one once we've updated your applicaiton status.")
           ->action('View application status', $url)
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
