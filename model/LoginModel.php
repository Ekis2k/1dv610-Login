<?php

namespace model;

class LoginModel {
    private $username;
    private $password;
    private $cookieName;
    private $cookiePassword;
    private $message = '';

    public function getUsername($usernameView) {
        $this->username = $usernameView;
    }
    public function getPassword($passwordView) {
        $this->password = $passwordView;
    }
    public function getMessage() {
        return $this->message;
    }

    public function checkPassword($passwordView, $usernameView) {
        if ($passwordView == '') {
            $this->message = "Password is missing";
        } else if ($passwordView != 'Password' && $usernameView == 'Admin') {
            $this->message = "Wrong name or password";
        } else if ($usernameView == 'Admin' && $passwordView == '') {
            $this->message = "Password is missing";
        }
    }
    public function checkUsername($usernameView, $passwordView) {
        if ($usernameView == '' && $passwordView = '') {
            $this->message = "Username is missing";
        } else if ($usernameView == '') {
            $this->message = "Username is missing";
        } else if ($passwordView == 'Password' && $usernameView == '') {
            $this->message = "Username is missing";
        } else if ($usernameView != 'Admin' && $passwordView == 'Password') {
            $this->message = "Wrong name or password";
        }
    }
    
    public function login($usernameView, $passwordView) {
        if ($usernameView == 'Admin' && $passwordView == 'Password') {
            if ($this->isLoggedIn() == false) {
                $this->message = "Welcome";
            }
            $_SESSION['username'] = $usernameView;
            $_SESSION['password'] = $passwordView;
        }
    }

    public function loginCookie($cookieUsername, $cookiePassword) {
        if ($cookieUsername == '' || $cookiePassword == '') {
            return false;
        }
        if ($cookieUsername == 'Admin' && $cookiePassword == 'Password') {
            if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
                $this->message = 'Welcome back with cookie';
            }
            $_SESSION['username'] = $cookieUsername;
            $_SESSION['password'] = $cookiePassword;
            return true;
        } else {
            $this->logout();
            $this->message = 'Wrong information in cookies';
            return false;
        }
    }

    public function getSessionUsername() {
        return $_SESSION['username'];
    }
    public function getSessionPassword() {
        return $_SESSION['password'];
    }

    public function isLoggedIn() {
        return isset($_SESSION['username']);
    }
    public function logout() {
        if ($this->isLoggedIn() == true) {
            $this->message = "Bye bye!";
        }
        unset($_SESSION['username']);
        unset($_SESSION['password']);
    }

}