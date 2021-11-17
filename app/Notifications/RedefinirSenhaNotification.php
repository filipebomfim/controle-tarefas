<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    private $token, $email, $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email, $name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
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
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $url = 'http://localhost:8000/password/reset/'.$this->token.'?email='.$this->email;
        return (new MailMessage)
            ->subject('Atualização de Senha')
            ->greeting('Olá '.$this->name)
            ->line('Esqueceu sua senha? Sem problemas, vamos resolver isso!!!')
            ->action('Clique aqui para modificar sua senha', $url)
            ->line("Esse link de reset irá expirar em $minutos minutos")
            ->line('Se você não solicitou essa troca de senha, nenhuma ação precisa ser feita')
            ->salutation('Até Breve!');
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
