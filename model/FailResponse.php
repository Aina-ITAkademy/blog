<?php

class FailResponse extends Response {
    public $obj;

    function __construct($message,$success,$obj) {
        $this->message = $message;
        $this->success = $success;
        $this->obj = $obj;
    }
}


?>