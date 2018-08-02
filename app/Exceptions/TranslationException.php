<?php

namespace App\Exceptions;


class TranslationException extends \Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
