<?php

namespace controller;

class LoginController {
    private $loginView;
    private $loginModel;

    public function __construct($loginview) {
        $this->loginView = $loginview;
        $this->loginModel = new \model\LoginModel();
    }

    public function userLogsIn() {
        if ($this->loginView->userPressedLogin()) {
            $usernameView = $this->loginView->setRequestUsername();
            $passwordView = $this->loginView->setRequestPassword();
            $this->loginModel->getUsername($usernameView);
            $this->loginModel->getPassword($passwordView);
            $this->loginModel->checkPassword($passwordView, $usernameView);
            $this->handleMessage();
            $this->loginModel->checkUsername($usernameView, $passwordView);
            $this->handleMessage();
            $this->loginModel->login($usernameView, $passwordView);
            $this->handleMessage();

            $this->keepIn();
        } else if ($this->loginView->userPressedLogout()) {
            $this->loginModel->logout();
            $this->loginView->unsetCookies();
            $this->handleMessage();
        } else if ($this->loginModel->isLoggedIn() == false) {
            $cookieUsername = $this->loginView->getNameCookie();
            $cookiePassword = $this->loginView->getPasswordCookie();
                if ($this->loginModel->loginCookie($cookieUsername, $cookiePassword) == false) {
                    $this->loginView->unsetCookies();
                }
            $this->handleMessage();
        }
        return $this->loginModel;
    }

    public function keepIn() {
        if ($this->loginView->keepInButton()) {
            $sessionUsername = $this->loginModel->getSessionUsername();
            $sessionPassword = $this->loginModel->getSessionPassword();
            
            $this->loginView->setSessionUsername($sessionUsername);
            $this->loginView->setSessionPassword($sessionPassword);
            $this->loginView->keepMeLoggedIn();
        } 
    }

    public function handleMessage() {
        $message = $this->loginModel->getMessage();
        $this->loginView->setMessage($message);
    }
}