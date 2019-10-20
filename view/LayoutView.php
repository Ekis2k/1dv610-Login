<?php

namespace view;

class LayoutView {
  
  public function render($loginModel, $v, DateTimeView $dtv, $list) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->newRegister() . '

          ' . $this->renderIsLoggedIn($loginModel->isLoggedIn()) . '
          
          <div class="container">
              ' . $v->response($loginModel) . '
              ' . $list . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  private function newRegister () {
    if (isset($_GET['register'])) {
      return '<a href="?">Back to login</a>';
    } else {
      return '<a href="?register">Register a new user</a>';
    }
  }
}
