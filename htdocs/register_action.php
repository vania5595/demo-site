<?php
    include("common.php");
    include("db.php");
    //Register Script
    if(isset($_FILES['avatar'])){
        //Image convert to Base64
        $avatar = "data:".$_FILES['avatar'][type].";base64,".base64_encode(file_get_contents($_FILES['avatar']['tmp_name']));
        
        //Read fields
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email    = $_POST["email"];
        $bday     = $_POST["bday"];
        $gender   = $_POST["gender"];
        $fcolor   = $_POST["fcolor"];


        //Fields Validation
        if(preg_match('/[a-zA-Z0-9]{4,13}/',$username))
        if(preg_match('/.{4,13}/',$password))
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        if(test_date($bday))
        if( ($gender=="male")||($gender=="female") )
        if(preg_match('/^#[a-f0-9]{6}$/i', $fcolor))
        $valid=true;
        if(!$valid){
            echo "<h1>Invalid Data</h1>";
            exit;
        }
        $chash=hash("sha256",$password);
        $passhash=hash("sha256",$chash);;
        $stmt = $mysqli->prepare("INSERT INTO Users VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssss', $username, $passhash, $avatar, $gender, $bday, $email, $fcolor);
        if(!$stmt->execute())
            echo "Ник занят";
        else{
            setcookie("phash", $chash, time()+1000000);
            setcookie("username", $username, time()+1000000);
            header('Location: /');
        }

    }else echo "<h1>File not getted!</h1>";
?>