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
            $this->message = "Username has too few characters, at least 3 characters.";
        } else if ($this->usernameRegister == 'Admin') {
            $this->message = "User exists, pick another username.";
        }
    }
    public function checkPassword() {
        if (strlen($this->passwordRegister) < 6) {
            $this->message = "Password has too few characters, at least 6 characters.";
        }
        if ($this->passwordRegister != $this->passwordCheck) {
            $this->message = "Passwords do not match.";
        }
    }
    public function getMessageRegister() {
        return $this->message;
    }
}