<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('view/ListView.php');
require_once('controller/ListController.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('model/LoginModel.php');
require_once('model/RegisterModel.php');
require_once('model/ListModel.php');


class Application {
    //VIEWS
    private $v;
    private $dtv;
    private $lv;
    private $rv;
    //MODELS
    private $lm;
    //CONTOLLERS
    private $lc;
    private $rc;
    private $lstc;

    public function __construct() {
        $this->v = new \view\LoginView();
        $this->dtv = new \view\DateTimeView();
        $this->lv = new \view\LayoutView();
        $this->rv = new \view\RegisterView();
        $this->lstv = new \view\ListView();
        $this->lc = new \controller\LoginController($this->v);
        $this->rc = new \controller\RegisterController($this->rv);
        $this->lstc = new \controller\ListController($this->lstv);
        $this->lm = new \model\ListModel(); 
    }

    public function start() {
        $loginModel = $this->lc->userLogsIn();
        $registerModel = $this->rc->userRegister();
        $listModel = $this->lstc->userAddListitem();
        $listView = $this->lstv->listHTML();

        if ($loginModel->isLoggedIn()) {
            if ($this->rv->register()) {
                $this->lv->render($loginModel, $this->v, $this->dtv, $listView);
            } else {
                $this->lv->render($loginModel, $this->v, $this->dtv, $listView);
            }
        } else {
            if ($this->rv->register()) {
                $this->lv->render($registerModel, $this->rv, $this->dtv, $listView);
            } else {
                $this->lv->render($loginModel, $this->v, $this->dtv, $listView);
            }
        }
    }
}
