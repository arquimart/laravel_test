<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeStatus extends Notification
{
    use Queueable;
    protected $status;
    protected $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $status, string $name)
    {
        $this->status = $status;
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
       return (new MailMessage)
       ->subject('Su pedido ha sido revisado')
       ->greeting('Hola '.$this->name.'')
       ->line('El estado de su pedido cambió a: '.$this->status.'!')
       ->line('Gracias por usar nuestra aplicación!');
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
