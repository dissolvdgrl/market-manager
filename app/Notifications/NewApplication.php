<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplication extends Notification
{
    use Queueable;

    protected $new_application;

    /**
     * Create a new notification instance.
     */
    public function __construct($new_application)
    {
        $this->new_application = $new_application;
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

        $url = url('/applications/'.$this->new_application->id);

        return (new MailMessage)
            ->subject('New Banting Market Vendor Application')
            ->greeting('Dear market administrator')
            ->line('Someone submitted a new application.')
            ->action('View online', $url)
            ->line('You should review it.');
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
