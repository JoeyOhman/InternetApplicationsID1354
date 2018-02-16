<?php

namespace TastyRecipes\Util;

class CommentDTO implements \JsonSerializable {
    private $id, $username, $message;
    
    public function __construct($id, $username, $message) {
        $this->id = $id;
        $this->username = $username;
        $this->message = $message;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getUsername() {
        return htmlentities($this->username, ENT_QUOTES);
    }
    
    public function getMessage() {
        return htmlentities($this->message, ENT_QUOTES);
    }

    public function jsonSerialize() {
        $jsonObject = new \stdClass();
        $jsonObject->id = $this->id;
        $jsonObject->username = $this->username;
        $jsonObject->message = $this->message;
        return $jsonObject;
    }

}
