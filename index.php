<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('model/LoginModel.php');
require_once('model/RegisterModel.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$v = new \view\LoginView();
$dtv = new \view\DateTimeView();
$lv = new \view\LayoutView();
$rv = new \view\RegisterView();
$lc = new \controller\LoginController($v);
$rc = new \controller\RegisterController($rv);

session_start();

$loginModel = $lc->userLogsIn();
$registerModel = $rc->userRegister();

if ($loginModel->isLoggedIn()) {
    if ($rv->register()) {
        $lv->render($loginModel, $v, $dtv);
    } else {
        $lv->render($loginModel, $v, $dtv);
    }
} else {
    if ($rv->register()) {
        $lv->render($registerModel, $rv, $dtv);
    } else {
        $lv->render($loginModel, $v, $dtv);
    }
}

