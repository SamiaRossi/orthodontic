<?php
setcookie("email","",time() - 3600,'/');
setcookie("senha","",time() - 3600,'/');
header("Location:../index.php");
?>