<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FirmaCreada extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->greeting('Hola, '.$notifiable->nombre_re)
            ->line('Se ha generado una firma para tu email')
            ->line('')
            ->line('Para insertar tu firma en to Outlook, haz lo siguiente')
            ->line(' 1) En INICIO elige NUEVO CORREO ELECTRÓNICO')
            ->line(' 2) En INCLUIR elige Firma>Firmas')
            ->line(' 3) En la sección Firma para editar elige Nueva')
            ->line(' 4) Posteriormente abre el link de tu firma selecciona todo (ctrl+a), copia(ctrl+c)')
            ->line(' 5) En la seccion Firma para editar Pega(ctrl+v) y listo')
            ->action('Firma', route('generar.show',$notifiable->code_re))
            ->line('Gracias por usar la aplicación');
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
