<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class MensajeEnviado extends Notification
{

    public $mensaje;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
        // return ['database', 'broadcast'];
        // return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->greeting($notifiable->nombres . ',')
    //                 ->subject('Mensaje recibido desde SenaOnHand')
    //                 ->line('Tienes un nuevo mensaje.')
    //                 ->action('Ver mensaje', route('mensajes.show', $this->mensaje->id))
    //                 ->line('Gracias por usar nuestra SenaOnHand!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return[
            'thread'=>$this->mensaje,
            'user'=>auth()->user(),
            'link' => route('mensajes.show', $this->mensaje->id),
            'text' => "Has recibido un mensaje de " . User::find($this->mensaje->usuario_id)->nombres
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'thread'=>$this->mensaje,
            'user'=>auth()->user(),
            'link' => route('mensajes.show', $this->mensaje->id),
            'text' => "Has recibido un mensaje de " . User::find($this->mensaje->usuario_id)->nombres
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    // public function toArray($notifiable)
    // {
    //     // return $this->mensaje->toArray();
    //     return [
    //       'link' => route('mensajes.show', $this->mensaje->id),
    //       'text' => "Has recibido un mensaje de " . User::find($this->mensaje->usuario_id)->nombres
    //     ];
    // }
}
