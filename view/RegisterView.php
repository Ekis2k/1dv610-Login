<?php

class RegisterView {
    private function printRegisterHTML($message) {
        return '
        <h2>Register new user</h2>
			<form action="?register" method="post" enctype="multipart/form-data" > 
				<fieldset>
					<legend>Register - Write  Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="" />
                    <br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" size="20" id="' . self::$password . '" name="' . self::$password . '" />
                    <br>
					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="password" size="20" id="' . self::$password . '" name="' . self::$password . '" />
                    <br>
                    <input type="submit" name="' . self::$login . '" value="login" />
                    <br>
				</fieldset>
			</form>
		';
    }
}