<?php

class SuccessResponse extends Response {
    public $obj;

    function __construct($message,$success,$obj) {
        parent::__construct($message,$success);
        $this->obj = $obj;
    }
}


?>