<?php
include_once("language.php");
//Русская локализация
class RussianLanguage extends Language{
    public $name = "RU";
    public $full_name = "Русский";
    public $dictonary = array (
        "Flag" => "<img style=width:30px; src=flags/RU.svg>",
        "LogInTitle" => "Авторизация",
        "Username" => "Имя пользователя:",
        "Password" => "Пароль:",
        "LogInButton" => "Войти",
        "RegisterTitle" => "Регистрация",
        "RegisterButton" => "Создать аккаунт",
        "Email" => "Эл.почта:",
        "BDay" => "День рождения:",
        "Gender" => "Пол:",
        "Male" => "Мужчина",
        "Female" => "Женщина",
        "FColor" => "Любимый цвет:",
        "Avatar" => "Аватар:",
        "LogOut" => "Выйти"
    );
}
?>