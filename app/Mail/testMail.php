<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class testMail extends Mailable
{
    use Queueable, SerializesModels;


    public $data = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $user)
    {
        $this->data = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from("amardjebabla@test.com")
            ->view('emails.test')
            ->attachFromStorage('public/products/6T3wmARqyZoNd6zy4eqoe22OQJ9F3whWOQLO4MPI.jpg');
        //   ->attach(public_path('uploads\test\burger.png'));
    }
}
