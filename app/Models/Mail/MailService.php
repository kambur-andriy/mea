<?php

namespace App\Models\Mail;


use App\Exceptions\MailException;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;


class MailService
{

	/**
	 * @var String
	 */
	private $to = '';

	/**
	 * @var Mailable
	 */
	private $mailContent;

	/**
	 * MailService constructor.
	 *
	 * @param Mailable $mailContent
	 * @param string $recipient
	 */
	public function __construct(string $to, Mailable $mailContent)
	{

		$this->to = $to;
		$this->mailContent = $mailContent;

	}

	/**
	 * Send email
	 *
	 *
	 * @return void
	 * @throws
	 */
	public function sendMail()
	{

		if ($this->to === '' || !$this->mailContent instanceof Mailable) {
			throw new MailException('Error sending email');
		}

		Mail::to($this->to)->send($this->mailContent);

	}

}
