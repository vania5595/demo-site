<?php
include_once("modal.php");
include_once("common.php");


class LoginForm extends Modal{
    public $id = "login_form";

    protected function getContent(){
        global $current_language;
        global $lsw;
        $this->title=$current_language->getWord("LogInTitle");
        return "<form method=POST action='login_action.php'>".
            form_label($current_language->getWord("Username")).input_widget("username","text").
            form_label($current_language->getWord("Password")).input_widget("password","password").
            submit_widget($current_language->getWord("LogInButton")).$lsw->renderWidget().
        "</form>";
    }
}
?>