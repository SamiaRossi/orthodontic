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
$email = $_GET["email"];
$query = "SELECT id_usuario FROM usuarios WHERE (email = '$email')";

$sel = mysqli_query($conn,$query);
$linha = mysqli_fetch_array($sel);
$today = date('Y-m-d');
//inserir novo registro
$sql3 = "INSERT INTO sugestao (titulo,sugestao,id_usuario,dt_cadastro,qtd_votos,situacao) VALUES ('".$_POST['titulo']."','".$_POST['sugestao']."','".$linha['id_usuario']."','$today',0, 'Pendente')";
$sql3 = mysqli_query($conn,$sql3) or die(mysql_error());
echo "<script type='text/javascript'>
swal({
title: 'Mensagem:',
text: 'Sugestao enviada com Sucesso!',
type: 'success'
}).then(function() {
window.location = '../sugestao.php';
});</script>";
	 exit;
?>
</body>
</html>