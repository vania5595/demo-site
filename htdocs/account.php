<?php
include_once("db.php");
class Account{
    //User variables
    public $username = "Guest";

    public $avatar = "";

    public $bday = "02-02-2002";

    public $gender = "male";

    public $email = "mega@man.com";

    public $fcolor = "#000000";

    public function isGuest(){
        return $this->username == "Guest";
    }
    //User Menu Render
    public function renderUserMenu(){
        global $current_language;
        //Guest Avatar
        if( $this->isGuest() ){
            return "<img height=50px src=guest.svg>".
            "<a href=# data-toggle='modal' data-target='#login_form'>".$current_language->getWord("LogInTitle")."</a>/".
            "<a href=# data-toggle='modal' data-target='#register_form'>".$current_language->getWord("RegisterTitle")."</a>";
        }
        else
        //User Avatar
        {
            return "<img style='object-fit:cover;width:50px;height:50px;' src='".$this->avatar."'>".
            $this->username."<a href=logout.php> ".$current_language->getWord("LogOut")."</a>";
        }
        
    }
    //Cookie Auth check
    public function checkAuth(){
        global $mysqli;
        global $_COOKIE;
        
        $stmt = $mysqli->prepare("SELECT passhash,avatar,bday,gender,email,fcolor FROM Users WHERE username=?");
        $stmt->bind_param('s',$_COOKIE["username"]);
        $stmt->execute();
        $stmt->bind_result($phash,$this->avatar,$this->bday,$this->gender,$this->email,$this->fcolor);
        if($stmt->fetch()){
            if(hash("sha256",$_COOKIE["phash"],false)==$phash)
                $this->username=$_COOKIE["username"];
        }
    }

    public function bigAvatar(){
        if( $this->isGuest() ) return "<img height=300px src=guest.svg>";
        else return "<img style='object-fit:cover;width:300px;height:300px;' src='".$this->avatar."'>";
    }
    //User Info Table Row Renderer
    protected function infoTableRow($name,$value){
        global $current_language;
        return "<tr>".
            "<td>".
                $current_language->getWord($name).
            "</td>".
            "<td>".
                $value.
            "</td>".
        "</tr>";
    }
    //Gender Multilanguage
    public function genderTranslate($g){
        global $current_language;
        if($g=="male")
            return $current_language->getWord("Male");
        if($g=="female")
            return $current_language->getWord("Female");
    }
    //User Info Table
    public function infoTable(){
        return "<table>".
            $this->infoTableRow("Username",$this->username).
            $this->infoTableRow("BDay",$this->bday).
            $this->infoTableRow("Email",$this->email).
            $this->infoTableRow("Gender",$this->genderTranslate($this->gender)).
            $this->infoTableRow("FColor",
                "<div style='width:30px;height:20px;background-color:".$this->fcolor."'></div>"
            ).
        "</table>";
    }
}
?>