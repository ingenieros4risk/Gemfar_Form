<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\SerializesModels;

class GenfarConfirmarSupplier extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->data['file_to_client']){
            $pathFile = $this->data['file_to_client'];
            return $this->markdown('email.sanofi.confirmar')->subject('NOTIFICACIÓN CONFIRMACIÓN DE TAREA '.$this->data['id_task'])->with('data', $this->data)->attach($pathFile->getRealPath(), array(
                'as' => 'Adjunto Solicitud.'.$pathFile->getClientOriginalExtension(),
                'mime' => $pathFile->getMimeType())
            );
            
        }else{
            return $this->markdown('email.sanofi.confirmar')->subject('NOTIFICACIÓN CONFIRMACIÓN DE TAREA '.$this->data['id_task'])->with('data', $this->data);
        }
    }
}
