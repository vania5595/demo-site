<?php
//Log In Script
include_once("db.php");
$stmt = $mysqli->prepare("SELECT passhash FROM Users WHERE username=?");
$stmt->bind_param('s',$_POST["username"]);
$stmt->execute();
$stmt->bind_result($phash);
if($stmt->fetch()){
    $chash=hash("sha256",$_POST["password"]);
    if(hash("sha256",$chash)==$phash){
        setcookie("phash", $chash, time()+1000000);
        setcookie("username", $_POST["username"], time()+1000000);
        header('Location: /');
        exit;
    }
}
echo "<h1>Invalid Password or Username</h1>";
?>