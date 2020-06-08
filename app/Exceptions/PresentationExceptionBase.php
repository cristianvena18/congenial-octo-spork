<?php


namespace App\Exceptions;


use Exception;
use Presentation\Http\Enums\HttpCodes;

class PresentationExceptionBase extends Exception
{
    public function __construct($message = "", $code = HttpCodes::INTERNAL_ERROR)
    {
        parent::__construct($message, $code);
    }
}
