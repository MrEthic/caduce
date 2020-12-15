<?php


class AlertException extends Exception
{

    private string $type;

    public function __construct(string $message, string $type = "BAD", int $code = 0, Exception $previous = null) {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }

    public function getType() : string {
        return $this->type;
    }

}