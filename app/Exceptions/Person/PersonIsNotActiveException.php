<?php

namespace App\Exceptions\Person;

class PersonIsNotActiveException extends \Exception
{
    protected $message = "Person is not active";

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = empty($message) ? $this->message : $message;
        parent::__construct($message, $code, $previous);
    }
}
