<?php

namespace controller;

class RegisterController {
    private $registerView;
    private $registerModel;

    public function __construct($registerView) {
        $this->registerView = $registerView;
        $this->registerModel = new \model\RegisterModel();
    }

    public function userRegister() {
        if ($this->registerView->userPressedRegister()) {
            $this->setValues();
            $this->registerModel->checkUsername();
            $this->handleMessages();
            $this->registerModel->checkPassword();
            $this->handleMessages();
        }
    }

    public function setValues() {
        $username = $this->registerView->getTheUsername();
        $password = $this->registerView->getThePassword();
        $passwordCheck = $this->registerView->getConfirmedPassword();
        $this->registerModel->setUser($username);
        $this->registerModel->setPassword($password);
        $this->registerModel->setCheckPassword($passwordCheck);
    }

    public function handleMessages() {
        $message = $this->registerModel->getMessageRegister();
        $this->registerView->setRegisterMessage();
    }
}