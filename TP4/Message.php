<?php

class Message
{
    private string $message ="";

    public function __construct(string $message){
        $this->message = $message;
    }
    public function getMessage() : string{
        return $this->message;
    }
    public function setMessage(string $message) : string{
        $this->message = $message;
        return $message;
    }

}