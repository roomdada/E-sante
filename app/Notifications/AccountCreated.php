<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AccountCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user->load('medicalBooklet');
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
        return (new MailMessage)
                    ->greeting('Bonjour ' . $this->user->full_name)
                    ->subject('Création de compte')
                    ->line('Votre compte a été créé avec succès au centre Polyclinique Internationale Sainte-Anne-Marie(PISAM).')
                    ->line('Vous pouvez desormais vous connecter a notre plateforme en ligne afin de prendre rendez-vous avec votre medecin et suivre vos consultations et bien d\'autre.')
                    ->line('Votre identifiant est: ' . $this->user->identifier)
                    ->action('Se connecter', url('/'));
   }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
