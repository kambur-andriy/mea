<?php

namespace App\Exceptions;


class DescriptionException extends \Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
