<?php

namespace App\Exceptions;


class PasswordException extends \Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
