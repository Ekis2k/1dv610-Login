<?php

class RegisterView {
    private static $login = 'RegisterView::UserName';
    private static $messageId = 'RegisterView::Message';
    private static $password = 'RegisterView::Password';
    private static $checkPassword = 'RegisterView::PasswordCheck';
    private static $register = 'RegisterView::Register';
    private static $usernameStay = '';
    private $message = '';

    public function register(){
        if(isset($_POST[self::$register])) {
            if(strlen($_POST[self::$login]) < 3) {
                $this->message .= 'Username has too few characters, at least 3 characters.';
                $this->setUsername();
            }
            if (strlen($_POST[self::$password]) < 6) {
                $this->message .= '<br>Password has too few characters, at least 6 characters.';
                if (strlen($_POST[self::$login]) > 3) {
                    $this->setUsername();
                }
            }
            if ($_POST[self::$password] != $_POST[self::$checkPassword]) {
                $this->message .= 'Passwords do not match.';
                $this->setUsername();
            }
        }
    }
    private function response($message) {
        $this->register();

        return '
        <h2>Register new user</h2>
			<form action="?register" method="post" enctype="multipart/form-data" > 
				<fieldset>
					<legend>Register - Write  Username and password</legend>
					<p id="' . self::$messageId . '">' . $this->message . '</p>
					
					<label for="' . self::$login . '">Username :</label>
					<input type="text" size="20" id="' . self::$login . '" name="' . self::$login . '" value="' . self::$usernameStay . '" />
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
    private function setUsername() {
        $input = $_POST[self::$login];
        return self::$usernameStay = $input;
    }
    private function renderLoggedIn($isLoggedIn) {
        if ($isLoggedIn) {
            return '<h2>Logged in</h2>';
        } else {
            return '<h2>Not logged in</h2>';
        }
    }
}