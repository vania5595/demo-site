<?php
setcookie("phash", $chash, time()-1000000);
setcookie("username", $username, time()-1000000);
header('Location: /');
?>