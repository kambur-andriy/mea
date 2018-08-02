<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

	/**
	 * @var string Reset token link
	 */
    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @param string
     *
     * @return void
     */
    public function __construct($resetToken)
    {

        $this->resetLink = action('IndexController@resetPassword', ['reset_token' => $resetToken]);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset-password');
    }
}
