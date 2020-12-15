<?php


class AccessException extends Exception
{

    public function __construct(string $message = "Vous tentez d'accedez à une page interdite", string $type = "BAD", int $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

}