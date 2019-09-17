<?php
include_once("modal.php");
include_once("common.php");

class RegisterForm extends Modal{
    public $id = "register_form";

    protected $modal_size = "modal-lg";

    public function getContent(){
        global $current_language;
        global $lsw;
        $this->title=$current_language->getWord("RegisterTitle");
        return "<form method=POST action='register_action.php' enctype=multipart/form-data>".
            row(
                col(form_label($current_language->getWord("Username")).input_widget("username","text"," pattern='[a-zA-Z0-9]{4,13}'")).
                col(form_label($current_language->getWord("Password")).input_widget("password","password","pattern='.{6,20}'"))
            ).
            row(
                col(form_label($current_language->getWord("Email")).input_widget("email","text")).
                col(form_label($current_language->getWord("BDay")).input_widget("bday","date"))
            ).
            row(
                col(form_label($current_language->getWord("Gender")))
            ).
            row(
                col(radio_widget("gender","male").$current_language->getWord("Male","label","for=male")).
                col(radio_widget("gender","female").$current_language->getWord("Female","label","for=female"))
            ).
            row(
                col(form_label($current_language->getWord("FColor")).input_widget("fcolor","color")).
                col("<input type=hidden name=MAX_FILE_SIZE value=8000000/>".form_label($current_language->getWord("Avatar")).
                input_widget("avatar","file","accept='.png, .jpg, .jpeg, .gif'"))
            ).
            submit_widget($current_language->getWord("RegisterButton")).$lsw->renderWidget().
        "</form>";
    }
}

?>