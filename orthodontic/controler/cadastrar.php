<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    </head>
<body>
<?php
include_once("../model/conect.php");
$email= $_POST['email'];

$query = "SELECT * FROM usuarios WHERE (email = '$email')"; // verificar se email já existe
$sel = mysqli_query($conn,$query);
$linha = mysqli_fetch_array($sel);
$qnto = mysqli_num_rows($sel);

if ($qnto > 0) { //email já cadastrado
	echo "<script type='text/javascript'>
	swal({
    title: 'Você já possui cadastro!',
    text: 'Clique em Recuperar Senha!',
    type: 'success'
}).then(function() {
    window.location = '../index.php';
});</script>";
	exit;
}	else { //inserir novo registro
$sql3 = "INSERT INTO usuarios (nome,email,senha,tipo) VALUES ('".$_POST['nome']."','".$_POST['email']."','".$_POST['senha']."',1)";
$sql3 = mysqli_query($conn,$sql3) or die(mysql_error());
echo "<script type='text/javascript'>
swal({
title: 'Mensagem:',
text: 'Cadastro realizado com Sucesso!',
type: 'success'
}).then(function() {
window.location = '../index.php';
});</script>";
	 exit;
}
?>
</body>
</html>