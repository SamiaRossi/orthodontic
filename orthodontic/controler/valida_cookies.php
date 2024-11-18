<?php
if(isset($_COOKIE["email"])){
  $email = $_COOKIE["email"];
  $senha = $_COOKIE["senha"];
} else {
  echo "<SCRIPT Language='javascript'>
alert('Efetue o Login');
location.href='index.php';
</SCRIPT>"; 
}
?>