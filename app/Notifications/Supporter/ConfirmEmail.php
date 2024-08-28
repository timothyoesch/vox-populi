<?php

namespace App\Notifications\Supporter;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmEmail extends Notification
{
    use Queueable;

    public $supporter;
    /**
     * Create a new notification instance.
     */
    public function __construct($supporter)
    {
        $this->supporter = $supporter;
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
        return (new MailMessage)
            ->subject(__('emails.supporter.confirm-email.subject'))
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->view('emails.supporter.confirm-email.' . $this->supporter->locale, [
                'supporter' => $this->supporter,
            ]);
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
