<?php

namespace view;

class ListView {
    private static $messageId = 'ListView::Message';
    private static $remind = 'ListView::Remind';
    private static $show = 'ListView::Show';
    private static $list = 'ListView::List';
    private static $noteId = 'ListView::Note';
    private $message = '';
    private $answer;

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getList() {
        $input = $_POST[self::$list];
        return $input;
    }

    public function getAnswer($answer) {
        $this->answer = $answer;
    }

    public function userAdd() {
        return isset($_POST[self::$remind]);
    }

    public function userShow() {
        return isset($_POST[self::$show]);
    }

    public function showFile() {
        if ($this->$answer == true) {
            $myfile = 'list.txt';
            return \file_get_contents($myfile);
        }
    }

    public function listHTML() {
        return
            '<h2>Add something to your list</h2>
            <form method="post" id="listform">
            <fieldset>
            <p id="' . self::$messageId . '">' . $this->message . '</p>
            <label for="' . self::$list . '"></label>
            <input type="text" id="' . self::$list . '" name="' . self::$list .'"/>
            <input type="submit" id="submit" name="' . self::$remind .'" value="Add" />
            <input type="submit" id="submit2" name="' . self::$show .'" value="Show List" />
            <br>
            </fieldset>
            </form>
            ' . $this->showListForm(); 
    }

    public function showListForm() {
        if ($this->answer == true) {
            return 
                '<h2>List:</h2>
                <fieldset>
                    <p id="' . self::$noteId . '">' . $this->showFile() . '</p>
                </fieldset>
                ';
        }
    }
}