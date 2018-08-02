<?php

namespace App\Exceptions;


class UserException extends \Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
