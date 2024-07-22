<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Otp;

class VerfyEmail extends Notification
{
    use Queueable;

    private $otp;
    public function __construct()
    {
        $this->otp=new Otp ;
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
        $code=$this->otp->generate($notifiable->email,'numeric',6,10);
        return (new MailMessage)
                                ->greeting('Verfy Email')
                                ->line('code : '.$code->token)
                                ->action('verfy','/')
                                ->line('thanks');
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
