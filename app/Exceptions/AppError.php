<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AppError extends Exception
{
    public function __construct($message, $code = 400, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
    }


    public function __toString() {
        return $this->message . ' - Error code: ' . $this->code;
    }
}
