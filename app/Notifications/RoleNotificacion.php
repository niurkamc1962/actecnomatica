<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;


class RoleNotificacion extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notificacion)
    {
        $this->notificacion = $notificacion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        //dd('Role:'.$this->notificacion);

        //dd( config('app.url') );
        $url = config('app.url').'/login';
        $url1 = config('app.url').'/public/ficherospki/categoriapki5/Generacion_solicitud_Certificado_ACTECNOMATICA.pdf';
        $url_nuevoRegistro = config('app.url').'/solicitar_registro';

         if ($this->notificacion == 'Representante') {
             return (new MailMessage)
                 ->greeting('Estimado Usuario:!')
                 ->line(new HtmlString("Usted ha sido autorizado, como <b>Representante</b> de su empresa ante nuestra Autoridad de Certificación para realizar personalmente la petición de su certificado digital entrando por la pestaña  <strong>Autoridad Registro</strong>."))
                 ->line(new HtmlString("Recuerde introducir los datos solicitados correctamente ya que formarán parte del certificado."))
                 ->line(new HtmlString("Le recomendamos leer de la sección Ayuda el instructivo <strong>Generación de solicitud de Certificado digital en ACTECNOMATICA</strong>"))
                 ->line(new HtmlString("<strong>Alerta!</strong> No olvide resguardar el usuario y código de inscripción (contraseña) al proporcionar sus credenciales, lo necesitará para <b>descargar</b> e <b>instalar</b> su criptomaterial"))
                 ->line(new HtmlString("Como Representante también podrá visualizar información referente al servicio contratado por su empresa en la pestaña <b>Contrato</b>"))
                 ->action('Oprima el siguiente botón para entrar al sitio.', url($url));
         }

          if($this->notificacion == 'Aspirante') {
              return (new MailMessage)
                  ->greeting('Estimado Usuario:!')
                  ->line(new HtmlString("Usted ha sido autorizado, como <b>Aspirante</b> a un certificado digital para realizar personalmente la petición de su certificado digital entrando por la pestaña <strong>Autoridad Registro</strong>."))
                  ->line(new HtmlString("Recuerde introducir los datos solicitados correctamente ya que formarán parte del certificado."))
                  ->line(new HtmlString("Le recomendamos leer de la sección Ayuda el instructivo <strong>Generación de solicitud de Certificado digital en ACTECNOMATICA</strong>"))
                  ->line(new HtmlString("<strong>Alerta!</strong> No olvide resguardar el usuario y código de inscripción (contraseña) al proporcionar sus credenciales, lo necesitará para <b>descargar</b> e <b>instalar</b> su criptomaterial"))
                  ->action('Oprima el siguiente botón para entrar al sitio.', url($url));
          }

          if($this->notificacion == 'Titular') {
              return (new MailMessage)
                  ->greeting('Estimado Usuario:!')
                  ->line(new HtmlString("Usted, como <b>Titular</b> de un certificado digital emitido por la Autoridad de Certificación de Tecnomática puede continuar haciendo uso de nuestra <b>Autoridad Registro</b>, pero solo para realizar búsquedas de certificados emitidos y revocados a través de la opción de <b>Búsquedas</b>."))
                  ->line(new HtmlString("Le recomendamos leer de la sección Ayuda el instructivo <strong>Generación de solicitud de Certificado digital en ACTECNOMATICA</strong>"))
                  ->line(new HtmlString("Solo podrá volver a utilizar las opciones de <b>Registro</b> y <b>Solicitudes</b> en caso de que tenga que volver a gestionar otro certificado digital, ya sea por necesidad de revocar el que tiene o porque haya expirado. Todo esto a través de una nueva solicitud realizada por el Representante Legal de su empresa"))
                  ->action('Oprima el siguiente botón para entrar al sitio.', url($url));
          }

        if($this->notificacion == 'nuevoRegistro') {
            return (new MailMessage)
                ->greeting('Estimado Usuario:!')
                ->line(new HtmlString("Usted, ha sido designado para la firma digital de su empresa. Para eso debe registrarse en el sitio actecnomatica"))
                ->line(new HtmlString("Una vez registrado recibira un correo de confirmacion y despues de esto tendra la notificacion del role correspondiente"))
                ->action('Oprima el siguiente botón para entrar al sitio.', url($url_nuevoRegistro));
        }


       /* return (new MailMessage)
                    ->greeting('Estimado Usuario:!')
                    ->line(new HtmlString("Usted ha sido autorizado para realizar personalmente la petición de su certificado digital entrando por la pestaña <strong>Autoridad Registro</strong>."))
                    ->line('Recuerde introducir los datos solicitados correctamente ya que formarán parte del certificado.')
                    ->line(new HtmlString("Le recomendamos leer, previamente, el instructivo  <a href='{$url1}'>Generación de una solicitud de Certificado digital en la ACTECNOMATICA</a>"))
                    ->line(new HtmlString("<strong>Alerta!</strong> No olvide resguardar el usuario y código de inscripción (contraseña) al proporcionar sus credenciales, lo necesitará para descargar e instalar su criptomaterial"))
                    ->line('Si usted es Representante legal de su empresa ante nuestra Autoridad de Certificación, podrá visualizar la información referente al servicio contratado en la pestaña Contrato')
                    ->action('Oprima el siguiente boton para entrar al sitio.', url($url));

        /*return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/
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
            'data' => 'Cambio el role a: '.$this->notificacion,
        ];
    }
}
