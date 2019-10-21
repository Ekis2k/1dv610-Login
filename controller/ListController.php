<?php

namespace controller;

class ListController {
    private $listView;
    private $listModel;

    public function __construct($ListView) {
        $this->listView = $ListView;
        $this->listModel = new \model\ListModel();
    }

    public function userAddListitem() {
        if ($this->listView->userAdd()) {
            $value = $this->listView->getList();
            $this->listModel->setValueInBox($value);

            $this->listModel->writeFile();
            $message = $this->listModel->getMessage();
            $this->listView->setMessage($message);
        } else {
            $this->userGonnaShow();
        }
    }
    public function userGonnaShow() {
        if ($this->listView->userShow()) {
            $answer = $this->listModel->checkShow();
            $this->listView->getAnswer($answer);
            $this->listView->showListForm();
            $message = $this->listModel->getMessage();
            $this->listView->setMessage($message);
        }
    }
}