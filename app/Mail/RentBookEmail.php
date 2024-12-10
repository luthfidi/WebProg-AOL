<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RentBookEmail extends Mailable
{
    use SerializesModels;

    public $bookName;
    public $userName;

    // Pass necessary data to the email
    public function __construct($bookName, $userName)
    {
        $this->bookName = $bookName;
        $this->userName = $userName;
    }

    // Build the email message
    public function build()
    {
        return $this->subject('Book Rental Confirmation')
                    ->view('emails.rent_book')
                    ->with([
                        'bookName' => $this->bookName,
                        'userName' => $this->userName,
                    ]);
    }
}
