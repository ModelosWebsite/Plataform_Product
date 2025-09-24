<?php

// app/Notifications/PremiumExpiring.php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PremiumExpiring extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail', 'database']; // email + alerta no sistema
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
        ->subject('Aviso: Sua assinatura premium está a expirar')
        ->line('Olá ' . $notifiable->name . ', a sua assinatura premium expira em 15 dias.')
        ->line('Não perca o acesso aos recursos premium!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Sua assinatura premium expira em 15 dias. Renove já!',
        ];
    }
}