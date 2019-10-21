<?php

namespace model;

class ListModel {
    private $message = '';
    private $textboxValue;
    private $test;

    public function getMessage() {
        return $this->message;
    }
    public function setValueInBox($value) {
        return $this->textboxValue = $value;
    }

    public function checkIfUserIsLoggedIn() {
        if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
            return true;
        } else {
            return false;
        }
    }
    public function writeFile() {
        if ($this->checkIfUserIsLoggedIn() == true) {
            $my_file = 'list.txt';
            $handle = \fopen($my_file, 'a');
            $data = " - " . $this->textboxValue;
            fwrite($handle, $data);
            $this->message = 'Saved!';
        } else {
            $this->message = 'You need to login';
        }
    }

    public function checkShow() {
        if ($this->checkIfUserIsLoggedIn() == true) {
            return true;
        } else {
            $this->message = 'You need to login';
            return false;
        }
    }
}