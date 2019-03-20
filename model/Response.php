<?php

class Response {
    public $message;
    public $success;

    function __construct($message,$success) {
        $this->message = $message;
        $this->success = $success;
    }
}


?>