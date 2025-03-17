<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reservation;
    public $qrCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation, $qrCode)
    {
        $this->reservation = $reservation;
        $this->qrCode = $qrCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reminder')
                    ->with('reservation','qrCode')
                    ->subject('予約当日のお知らせ');
    }
}
