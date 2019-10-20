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
            $myFile = 'list.txt';
            $handle = \fopen($myFile, 'a') or die("Could'nt open the file");
            $data = "<br>" . "*" . $this->textboxValue;
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