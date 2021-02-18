<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailerNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $template;

    /**
     * Create a new message instance.
     *
     * @param $data
     * @param $mail_template
     */
    public function __construct($data,$mail_template)
    {
        $this->data = $data;
        $this->template = $mail_template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->data["subject"])->view($this->template,$this->data)->from($this->data["from"],$this->data["name"]);
    }
}
