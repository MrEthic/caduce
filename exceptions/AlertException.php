<?php


class AlertException extends Exception
{

    private string $type;

    public function __construct(string $message, int $code = 0, Exception $previous = null, string $type = "BAD") {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }

    public function getType() : string {
        return $this->type;
    }

}