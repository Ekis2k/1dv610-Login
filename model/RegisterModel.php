<?php

namespace model;

class RegisterModel {
    private $usernameRegister;
    private $passwordRegister;
    private $passwordCheck;
    private $message = '';

    public function isLoggedIn() {
        return isset($_SESSION['username']);
    }

    public function setUser($username) {
        $this->usernameRegister = $username;
    }
    public function setPassword($password) {
        $this->passwordRegister = $password;
    }
    public function setCheckPassword($password) {
        $this->passwordCheck = $password;
    }

    public function checkUsername() {
        if (strlen($this->usernameRegister) < 3) {
            $this->message .= "Username has too few characters, at least 3 characters";
        }
    }
    public function checkPassword() {
        if (strlen($this->passwordRegister) < 6) {
            $this->message .= "<br>Password has too few characters, at least 6 characters";
        }
        if ($this->passwordRegister != $this->passwordCheck) {
            $this->message .= "Password do not match";
        }
    }
    public function getMessagesRegister() {
        return $this->message;
    }
}