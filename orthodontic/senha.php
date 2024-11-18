<?php
include("model/conect.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar</title>
  <link rel="stylesheet" href="css/style.css">
  <script language="javascript" src="js/validacoes.js"></script>
  <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
<div class="container">
<div>Recuperar Senha</div>
    <form id="signin" method="post" action="controler/recuperar.php">
      <input type="text" id="email" name="email" placeholder="Email" required />
      <i class="fas fa-envelope iEmail2"></i>
      <button type="submit">Enviar</button>
    </form>
</div>
</body>
</html>