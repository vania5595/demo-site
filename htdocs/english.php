<?php
include_once("language.php");
//English localisation
class EnglishLanguage extends Language{
    public $name = "EN";
    public $full_name = "English";
    public $dictonary = array (
        "Flag" => "<img style=width:30px; src=flags/EN.svg>",
        "LogInTitle" => "Login",
        "Username" => "Username:",
        "Password" => "Password:",
        "LogInButton" => "Login",
        "RegisterTitle" => "Register",
        "RegisterButton" => "Register",
        "Email" => "Email:",
        "BDay" => "Birth Day:",
        "Gender" => "Gender:",
        "Male" => "Male",
        "Female" => "Female",
        "FColor" => "Favorite Color:",
        "Avatar" => "Avatar:",
        "LogOut" => "Logout"
    );
}
?>