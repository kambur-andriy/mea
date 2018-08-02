<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserMail extends Mailable
{
    use Queueable, SerializesModels;

	/**
	 * @var string Main page link
	 */
	public $mainPageLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

	    $this->mainPageLink = action('IndexController@login');;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.create-account');
    }
}
