<?php
include_once("bootstrap.php");
include_once("login_form.php");
include_once("register_form.php");
include_once("english.php");
include_once("russian.php");
include_once("account.php");
include_once("common.php");

//Multi Language Support
$english_language = new EnglishLanguage();
$russian_language = new RussianLanguage();
$current_language = $english_language;
if($_COOKIE["lang"]=="RU")
    $current_language = $russian_language;
$lsw = new LanguageSelectWidget(
    array(
        $english_language,
        $russian_language
    )
);
$lsw->renderScripts();

//Auth check
$current_user = new Account();
$current_user->checkAuth();

//Load forms for Guest
if( $current_user->isGuest() ){
    $login_form = new LoginForm();
    echo $login_form->render();
    $register_form = new RegisterForm();
    echo $register_form->render();
}

//Main Container
echo container(
    row(
       "<div class=col-8><h1>DemoSite</h1></div>".
       "<div class=col-4>".$current_user->renderUserMenu()."</div>"
    ).
    row(
        "<div class=col></div>".
        "<div class='col-4'>".$current_user->bigAvatar()."</div>".
        "<div class='col-6'>".
        $current_user->infoTable().
        "</div>".
        "<div class=col></div>"
    ).
    row(
        "<div class='col-12'>".$lsw->renderWidget()."</div>"
    )
);

bootstrap_end();

?>