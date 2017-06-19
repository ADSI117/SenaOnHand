<?php

namespace App\Notifications;

use App\Publicacion;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PublicacionPublicada extends Notification
{

    protected $publicacion;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Publicacion $publicacion)
    {
        $this->publicacion = $publicacion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database'];
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
                    ->subject('Nueva publicacion')
                    ->line($notificable->nombres . 'Se ha publicado un nuevo post' )
                    ->action($this->publicacion->title, route('publicaciones.detalle', $this->publicacion->id))
                    ->line('Gracias por leer!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
      // return $this->mensaje->toArray();
      return [
        'link' => route('publicaciones.detalle', $this->publicacion->id),
        'text' => "Nueva publicacion de: " . User::find($this->publicacion->user)->nombres
      ];
    }
}
