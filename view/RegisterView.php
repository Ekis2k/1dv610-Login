<?php

namespace view;

class RegisterView {
    private static $login = 'RegisterView::UserName';
    private static $messageId = 'RegisterView::Message';
    private static $password = 'RegisterView::Password';
    private static $checkPassword = 'RegisterView::PasswordRepeat';
    private static $register = 'RegisterView::Register';
    private static $usernameStay = '';
    private $registerModel;
    private $message = '';

    public function setRegisterMessage($message) {
        $this->message = $message;
    }

    public function getTheUsername() {
        $input = $_POST[self::$login];
        return self::$usernameStay = $input;
    }

    public function getThePassword() {
        return $_POST[self::$password];
    }
    public function getConfirmedPassword() {
        return $_POST[self::$checkPassword];
    }
    public function userPressedRegister() {
        return isset($_POST[self::$register]);
    }

    public function register() {
        return isset($_GET['register']);
    }
    public function response() {

        return '
        <h2>Register new user</h2>
			<form action="?register" method="post" enctype="multipart/form-data" > 
				<fieldset>
					<legend>Register - Write  Username and password</legend>
					<p id="' . self::$messageId . '">' . $this->message . '</p>
					
					<label for="' . self::$login . '">Username :</label>
					<input type="text" size="20" id="' . self::$login . '" name="' . self::$login . '" value="abc" />
                    <br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" size="20" id="' . self::$password . '" name="' . self::$password . '" value="" />
                    <br>
					<label for="' . self::$checkPassword . '">Repeat Passowrd  :</label>
					<input type="password" size="20" id="' . self::$checkPassword . '" name="' . self::$checkPassword . '" value="" />
                    <br>
                    <input id="submit" type="submit" name="' . self::$register . '" value="Register" />
                    <br>
				</fieldset>
			</form>
		';
    }
    private function renderLoggedIn($isLoggedIn) {
        if ($isLoggedIn) {
            return '<h2>Logged in</h2>';
        } else {
            return '<h2>Not logged in</h2>';
        }
    }
}