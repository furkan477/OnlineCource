<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCourceNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected int $courceId)
    {
        //
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
            ->greeting('Merhaba !')
            ->subject('OnlineCource Platformunda dan 1 yeni mesaj')
            ->line('yeni bir kurs oluşturdunuz ve kursunuzu paylaşmak için detayları inceleyiniz')
            ->action('Oluşturduğunuz kursu inceleyiniz', route('cource.detail', $this->courceId))
            ->line('Online Kurs Yeni Hayatınızda Başarılar Diler İyi Günler!');
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
