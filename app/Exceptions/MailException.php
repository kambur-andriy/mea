<?php

namespace App\Exceptions;


class MailException extends \Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
