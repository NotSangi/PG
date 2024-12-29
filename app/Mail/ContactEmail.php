<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $cita;
    public $doc;
 
    public function __construct($cita, $doc)
    {
        $this->cita = $cita;
        $this->doc = $doc;
    }

    public function build()
    {
        return $this->subject('Cita Confirmada')->view('mail.confirmacion');
    }

    public function attachments(): array
    {
        return [];
    }
}
