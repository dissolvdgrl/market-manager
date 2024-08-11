<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;

class ApplicationUpdated extends Notification
{
    use Queueable;

    protected $application;
    protected $user_name;
    protected $status;
    protected $note;

    /**
     * Create a new notification instance.
     */
    public function __construct($application, $user_name)
    {
        $this->application = $application;
        $this->user_name = $user_name;
        $this->status = $application->status;
        $this->note = $application->note;
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
        $greeting = "Hello $this->user_name,";
        $url = config('app.url') . '/login';
        $terms = config('app.url') . '/terms-of-service';
        $status = ucfirst($this->status);
        $note = $this->note === ""
            ? ""
            : new HtmlString("Message from the organiser: <span style=\"font-style:italic;\">$this->note</span>") ;

        return (new MailMessage)
            ->subject('Banting Market Application Updated')
            ->greeting($greeting)
            ->line(new HtmlString("Your application to become a vendor at Brooklyn's Banting Market has been updated: <strong>$status</strong>"))
            ->line($note)
            ->line("To manage your Brooklyn Banting Market vendor account, please click the button to log in.")
            ->action('Log in', $url)
             ->line(new HtmlString("Make sure you have familiarised yourself with the <a href=\"$terms\" style=\"display:block; margin: 0 auto; width: 180px;\">market rules</a>"))
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
